// Clase base para entidades
class OrganizationEntity {
    constructor(id, title, description) {
        this.id = id;
        this.title = title;
        this.description = description;
    }

    displayCard() {
        return `
        <div class="card">
            <h3>${this.title}</h3>
            <p>${this.description}</p>
        </div>`;
    }
}

// Proyectos
class Project extends OrganizationEntity {
    constructor(id, title, description, goal, current = 0) {
        super(id, title, description);
        this.goal = goal;
        this.current = current;
        this.completed = false;
    }

    addDonation(amount) {
        this.current += amount;
        if (this.current >= this.goal && !this.completed) {
            this.completed = true;
            const event = new CustomEvent('projectCompleted', {
                detail: { project: this }
            });
            document.dispatchEvent(event);
        }
        return this.current;
    }

    displayCard() {
        const progress = ((this.current / this.goal) * 100).toFixed(1);
        return `
        <div class="project-card">
            <h3>${this.title}</h3>
            <p>${this.description}</p>
            <div class="progress-bar">
                <div class="progress" style="width: ${progress}%;">${progress}%</div>
            </div>
            <p>Recaudado: $${this.current} / Meta: $${this.goal}</p>
        </div>`;
    }
}

// Eventos
class Event extends OrganizationEntity {
    constructor(id, title, description, date, category) {
        super(id, title, description);
        this.date = new Date(date);
        this.category = category;
    }

    displayCard() {
        return `
        <div class="event-card">
            <h3>${this.title}</h3>
            <p>Fecha: ${this.date.toLocaleDateString()}</p>
            <p>Categoría: ${this.category}</p>
            <p>${this.description}</p>
        </div>`;
    }
}

// Base de datos simulada
const projects = [
    new Project(1, "Educación Rural", "Construcción de escuelas", 10000, 4500),
    new Project(2, "Reforestación", "Plantar 1000 árboles", 5000, 1200)
];

const events = [
    new Event(1, "Campaña de libros", "Recolección de textos escolares", "2025-07-15", "recaudación"),
    new Event(2, "Voluntariado ambiental", "Limpieza de playas", "2025-06-30", "voluntariado")
];

// Renderizado inicial
function renderProjects() {
    const container = document.getElementById('projects-container');
    if (container) {
        container.innerHTML = projects.map(p => p.displayCard()).join('');
    }
}

function renderEvents() {
    const container = document.getElementById('events-container');
    if (container) {
        container.innerHTML = events.map(e => e.displayCard()).join('');
    }
}

// Búsqueda y filtros de eventos
const searchBtn = document.getElementById('search-btn');
if (searchBtn) {
    searchBtn.addEventListener('click', () => {
        const searchTerm = document.getElementById('event-search').value.toLowerCase();
        const category = document.getElementById('event-category').value;

        const filtered = events.filter(event => {
            const matchesSearch = event.title.toLowerCase().includes(searchTerm) ||
                                  event.description.toLowerCase().includes(searchTerm);
            const matchesCategory = category === 'all' || event.category === category;
            return matchesSearch && matchesCategory;
        });

        const container = document.getElementById('events-container');
        if (container) {
            container.innerHTML = filtered.map(e => e.displayCard()).join('');
        }
    });
}

// Donaciones
const donateBtn = document.getElementById('donate-btn');
if (donateBtn) {
    donateBtn.addEventListener('click', () => {
        const amount = parseFloat(document.getElementById('donation-amount').value);
        const name = document.getElementById('donor-name').value || 'Anónimo';

        if (amount > 0) {
            projects[0].addDonation(amount);
            renderProjects();
            showNotification(`¡Gracias ${name}! Donación de $${amount} recibida`);
        } else {
            showNotification("Por favor ingresa un monto válido.");
        }
    });
}

// Sistema de notificaciones
function showNotification(message) {
    const notifications = document.getElementById('notifications');
    if (notifications) {
        const notification = document.createElement('div');
        notification.className = 'notification';
        notification.textContent = message;
        notifications.appendChild(notification);

        setTimeout(() => {
            notification.remove();
        }, 5000);
    }
}

// Eventos personalizados
document.addEventListener('projectCompleted', (e) => {
    showNotification(`🎉 ¡Felicidades! Proyecto "${e.detail.project.title}" completado`);
});

// Inicialización
window.onload = () => {
    renderProjects();
    renderEvents();
};
