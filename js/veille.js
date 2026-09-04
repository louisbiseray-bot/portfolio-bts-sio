// Configuration des flux RSS
const RSS_FEEDS = {
    magit: {
        url: 'https://www.lemagit.fr/rss/ContentSyndication.xml',
        name: 'MAGIT',
        icon: 'bi-newspaper'
    },
    itconnect: {
        url: 'https://www.it-connect.fr/feed/',
        name: 'ITCONNECT',
        icon: 'bi-newspaper'
    }
};

// Stockage des articles en cache (localStorage)
const CACHE_KEY = 'veille_articles_cache';
const CACHE_DURATION = 3600000; // 1 heure en millisecondes

// Éléments DOM
const articlesContainer = document.getElementById('articles-container');
const loadingSpinner = document.getElementById('loading');
const errorMessage = document.getElementById('error-message');
const errorText = document.getElementById('error-text');
const refreshBtn = document.getElementById('refreshBtn');
const filterBtns = document.querySelectorAll('.filter-btn');

let allArticles = [];
let currentFilter = 'all';

// Initialisation
document.addEventListener('DOMContentLoaded', () => {
    refreshBtn.addEventListener('click', refreshFeeds);
    filterBtns.forEach(btn => {
        btn.addEventListener('click', (e) => {
            filterBtns.forEach(b => b.classList.remove('active'));
            e.target.closest('.filter-btn').classList.add('active');
            currentFilter = e.target.closest('.filter-btn').getAttribute('data-filter');
            displayArticles();
        });
    });

    // Charger les flux au démarrage
    loadFeeds();
});

/**
 * Charge les flux RSS depuis le cache ou depuis les URLs
 */
async function loadFeeds() {
    showLoading(true);
    hideError();

    try {
        // Vérifier le cache
        const cached = getCachedArticles();
        if (cached && cached.length > 0) {
            allArticles = cached;
            displayArticles();
            showLoading(false);
            return;
        }

        // Charger les flux
        allArticles = [];
        for (const [key, feed] of Object.entries(RSS_FEEDS)) {
            try {
                const articles = await fetchRSSFeed(feed.url, key, feed.name);
                allArticles.push(...articles);
            } catch (error) {
                console.error(`Erreur lors du chargement de ${feed.name}:`, error);
            }
        }

        if (allArticles.length === 0) {
            showError('Impossible de charger les flux RSS. Veuillez vérifier votre connexion internet.');
        } else {
            // Trier par date (plus récent d'abord)
            allArticles.sort((a, b) => new Date(b.pubDate) - new Date(a.pubDate));
            
            // Mettre en cache
            cacheArticles(allArticles);
            
            displayArticles();
        }
    } catch (error) {
        console.error('Erreur lors du chargement des flux:', error);
        showError('Impossible de charger les flux RSS. Vérifiez votre connexion internet.');
    } finally {
        showLoading(false);
    }
}

/**
 * Récupère un flux RSS et le parse
 */
async function fetchRSSFeed(rssUrl, feedKey, feedName) {
    // Utiliser un service CORS proxy pour éviter les problèmes CORS
    const corsProxy = 'https://api.allorigins.win/get?url=';
    const url = corsProxy + encodeURIComponent(rssUrl);

    const response = await fetch(url);
    if (!response.ok) {
        throw new Error(`Erreur HTTP ${response.status}`);
    }

    const data = await response.json();
    const parser = new DOMParser();
    const xmlDoc = parser.parseFromString(data.contents, 'text/xml');

    if (xmlDoc.getElementsByTagName('parsererror').length > 0) {
        throw new Error('Erreur de parsing XML');
    }

    const items = xmlDoc.getElementsByTagName('item');
    const articles = [];

    for (let i = 0; i < items.length; i++) {
        const item = items[i];
        const article = {
            title: getXMLText(item, 'title'),
            description: getXMLText(item, 'description') || getXMLText(item, 'content:encoded'),
            link: getXMLText(item, 'link'),
            pubDate: getXMLText(item, 'pubDate') || getXMLText(item, 'updated'),
            source: feedName,
            sourceKey: feedKey
        };

        if (article.title && article.link) {
            articles.push(article);
        }
    }

    return articles;
}

/**
 * Récupère le texte d'un élément XML
 */
function getXMLText(element, tagName) {
    const el = element.querySelector(tagName);
    return el ? el.textContent.trim() : '';
}

/**
 * Affiche les articles filtrés
 */
function displayArticles() {
    const filtered = currentFilter === 'all' 
        ? allArticles 
        : allArticles.filter(a => a.sourceKey === currentFilter);

    if (filtered.length === 0) {
        articlesContainer.innerHTML = `
            <div class="no-articles">
                <i class="bi bi-inbox"></i>
                <p>Aucun article disponible</p>
            </div>
        `;
        articlesContainer.style.display = 'grid';
        return;
    }

    articlesContainer.innerHTML = filtered.map(article => `
        <article class="article-card slide-up">
            <div class="article-header">
                <div class="article-meta">
                    <span class="source-badge badge">
                        <i class="bi bi-rss me-1"></i>${article.source}
                    </span>
                    <time class="article-date">
                        ${formatDate(article.pubDate)}
                    </time>
                </div>
            </div>
            <h3 class="article-title">
                <a href="${article.link}" target="_blank" rel="noopener noreferrer">
                    ${article.title}
                </a>
            </h3>
            <p class="article-description">
                ${truncateText(article.description, 200)}
            </p>
            <div class="article-footer">
                <a href="${article.link}" target="_blank" rel="noopener noreferrer" class="read-more">
                    Lire l'article <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>
        </article>
    `).join('');

    articlesContainer.style.display = 'grid';
}

/**
 * Formate la date au format français
 */
function formatDate(dateString) {
    if (!dateString) return 'Date inconnue';
    
    try {
        const date = new Date(dateString);
        const now = new Date();
        const diffMs = now - date;
        const diffMins = Math.floor(diffMs / 60000);
        const diffHours = Math.floor(diffMs / 3600000);
        const diffDays = Math.floor(diffMs / 86400000);

        if (diffMins < 1) return 'À l\'instant';
        if (diffMins < 60) return `il y a ${diffMins}m`;
        if (diffHours < 24) return `il y a ${diffHours}h`;
        if (diffDays < 7) return `il y a ${diffDays}j`;

        return date.toLocaleDateString('fr-FR', {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });
    } catch {
        return 'Date inconnue';
    }
}

/**
 * Tronque le texte à une longueur donnée
 */
function truncateText(text, maxLength) {
    if (!text) return 'Pas de description disponible';
    
    // Supprimer les balises HTML
    const cleaned = text.replace(/<[^>]*>/g, '');
    
    if (cleaned.length <= maxLength) return cleaned;
    return cleaned.substring(0, maxLength) + '...';
}

/**
 * Actualise les flux RSS
 */
function refreshFeeds() {
    refreshBtn.disabled = true;
    refreshBtn.innerHTML = '<i class="bi bi-hourglass-split me-2"></i>Actualisation...';
    
    // Effacer le cache
    localStorage.removeItem(CACHE_KEY);
    
    // Recharger les flux
    loadFeeds().then(() => {
        refreshBtn.disabled = false;
        refreshBtn.innerHTML = '<i class="bi bi-arrow-clockwise me-2"></i>Actualiser';
    });
}

/**
 * Met en cache les articles
 */
function cacheArticles(articles) {
    const cacheData = {
        timestamp: Date.now(),
        articles: articles
    };
    localStorage.setItem(CACHE_KEY, JSON.stringify(cacheData));
}

/**
 * Récupère les articles du cache
 */
function getCachedArticles() {
    const cached = localStorage.getItem(CACHE_KEY);
    if (!cached) return null;

    try {
        const data = JSON.parse(cached);
        const now = Date.now();
        
        // Vérifier si le cache est expiré
        if (now - data.timestamp > CACHE_DURATION) {
            localStorage.removeItem(CACHE_KEY);
            return null;
        }

        return data.articles;
    } catch {
        localStorage.removeItem(CACHE_KEY);
        return null;
    }
}

/**
 * Affiche le message de chargement
 */
function showLoading(show) {
    loadingSpinner.style.display = show ? 'flex' : 'none';
}

/**
 * Affiche un message d'erreur
 */
function showError(message) {
    errorText.textContent = message;
    errorMessage.style.display = 'block';
}

/**
 * Masque le message d'erreur
 */
function hideError() {
    errorMessage.style.display = 'none';
}
