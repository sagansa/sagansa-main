// Navbar scroll effect
const navbar = document.getElementById('navbar');
window.addEventListener('scroll', () => {
    navbar.classList.toggle('scrolled', window.scrollY > 20);
});

// Mobile menu toggle
const mobileToggle = document.getElementById('mobileToggle');
const navLinks = document.getElementById('navLinks');
mobileToggle.addEventListener('click', () => {
    navLinks.classList.toggle('open');
    mobileToggle.classList.toggle('active');
});

// Close mobile menu on link click
navLinks.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', () => {
        navLinks.classList.remove('open');
        mobileToggle.classList.remove('active');
    });
});

// Nav dropdown toggle
document.querySelectorAll('.nav-dropdown-toggle').forEach(toggle => {
    toggle.addEventListener('click', (e) => {
        e.stopPropagation();
        const dropdown = toggle.closest('.nav-dropdown');
        const isOpen = dropdown.classList.contains('open');
        const isExpanded = toggle.getAttribute('aria-expanded') === 'true';

        // Close all other dropdowns
        document.querySelectorAll('.nav-dropdown.open').forEach(d => {
            d.classList.remove('open');
            d.querySelector('.nav-dropdown-toggle').setAttribute('aria-expanded', 'false');
        });

        // Toggle current
        dropdown.classList.toggle('open', !isOpen);
        toggle.setAttribute('aria-expanded', !isExpanded);
    });
});

// Close dropdown when clicking outside
document.addEventListener('click', (e) => {
    if (!e.target.closest('.nav-dropdown')) {
        document.querySelectorAll('.nav-dropdown.open').forEach(d => {
            d.classList.remove('open');
            d.querySelector('.nav-dropdown-toggle').setAttribute('aria-expanded', 'false');
        });
    }
});

// Close mobile menu & dropdown on dropdown link click
document.querySelectorAll('.nav-dropdown-menu a').forEach(link => {
    link.addEventListener('click', () => {
        navLinks.classList.remove('open');
        mobileToggle.classList.remove('active');
        document.querySelectorAll('.nav-dropdown.open').forEach(d => {
            d.classList.remove('open');
            d.querySelector('.nav-dropdown-toggle').setAttribute('aria-expanded', 'false');
        });
    });
});

// Scroll animations
const animateElements = document.querySelectorAll('.animate-in');
const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry, index) => {
        if (entry.isIntersecting) {
            setTimeout(() => {
                entry.target.classList.add('visible');
            }, index * 100);
            observer.unobserve(entry.target);
        }
    });
}, { threshold: 0.1 });

animateElements.forEach(el => observer.observe(el));

// Smooth scroll for anchor links (with navbar offset)
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        const href = this.getAttribute('href');
        if (href === '#') return;
        e.preventDefault();
        const target = document.querySelector(href);
        if (target) {
            const navbarHeight = document.getElementById('navbar').offsetHeight;
            const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - navbarHeight;
            window.scrollTo({ top: targetPosition, behavior: 'smooth' });
        }
    });
});

// Q&A Accordion
document.querySelectorAll('.qa-question').forEach(question => {
    question.addEventListener('click', function() {
        const item = this.closest('.qa-item');
        if (!item) return;
        const isActive = item.classList.contains('active');

        // Close all other items
        document.querySelectorAll('.qa-item.active').forEach(activeItem => {
            if (activeItem !== item) {
                activeItem.classList.remove('active');
            }
        });

        // Toggle current item
        if (isActive) {
            item.classList.remove('active');
        } else {
            item.classList.add('active');
        }
    });
});

// Cookie Banner
const cookieBanner = document.getElementById('cookieBanner');
const cookieAccept = document.getElementById('cookieAccept');
const cookieDecline = document.getElementById('cookieDecline');

if (cookieBanner && !localStorage.getItem('cookieConsent')) {
    setTimeout(() => {
        cookieBanner.classList.add('show');
    }, 1500);
}

if (cookieAccept) {
    cookieAccept.addEventListener('click', () => {
        localStorage.setItem('cookieConsent', 'accepted');
        cookieBanner.classList.remove('show');
    });
}

if (cookieDecline) {
    cookieDecline.addEventListener('click', () => {
        localStorage.setItem('cookieConsent', 'declined');
        cookieBanner.classList.remove('show');
    });
}

// ==================== GALLERY TABS ====================
(function() {
    const tabs = document.querySelectorAll('.gallery-tab');
    const slides = document.querySelectorAll('.gallery-slide');

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            const target = tab.getAttribute('data-target');

            // Set active tab
            tabs.forEach(t => t.classList.remove('active'));
            tab.classList.add('active');

            // Set active slide
            slides.forEach(slide => {
                slide.classList.remove('active');
                if (slide.id === `slide-${target}`) {
                    slide.classList.add('active');
                }
            });
        });
    });
})();

// ==================== THREE.JS 3D CANVAS ====================
(function() {
    const container = document.getElementById('threeContainer');
    const canvas = document.getElementById('threeCanvas');
    if (!container || !canvas || typeof THREE === 'undefined') return;

    // Create scene, camera, renderer
    const scene = new THREE.Scene();
    
    // Ambient & Directional Lights
    const ambientLight = new THREE.AmbientLight(0xffffff, 0.7);
    scene.add(ambientLight);

    const dirLight1 = new THREE.DirectionalLight(0x3b82f6, 1.8);
    dirLight1.position.set(5, 5, 5);
    scene.add(dirLight1);

    const dirLight2 = new THREE.DirectionalLight(0x8b5cf6, 1.8);
    dirLight2.position.set(-5, -5, 5);
    scene.add(dirLight2);

    // Renderer
    const renderer = new THREE.WebGLRenderer({ canvas: canvas, alpha: true, antialias: true });
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));

    // Responsive sizing function
    function resize() {
        const width = container.clientWidth;
        const height = container.clientHeight || 350;
        
        camera.aspect = width / height;
        camera.updateProjectionMatrix();
        renderer.setSize(width, height);
    }

    const camera = new THREE.PerspectiveCamera(45, 1, 0.1, 100);
    camera.position.z = 8.5;
    
    // Initial size
    resize();

    // Create a group to hold everything for mouse interaction tilting
    const group = new THREE.Group();

    // ------------------ 1. CENTRAL SYNC CORE (Green) ------------------
    const coreGroup = new THREE.Group();
    
    const coreGeo = new THREE.SphereGeometry(0.4, 16, 16);
    const coreMat = new THREE.MeshPhongMaterial({
        color: 0x10b981,
        emissive: 0x059669,
        wireframe: true,
        transparent: true,
        opacity: 0.9
    });
    const coreMesh = new THREE.Mesh(coreGeo, coreMat);
    coreGroup.add(coreMesh);

    // Orbiting ring around the core
    const coreRingGeo = new THREE.TorusGeometry(0.7, 0.025, 8, 48);
    const coreRing = new THREE.Mesh(coreRingGeo, coreMat);
    coreRing.rotation.x = Math.PI / 3;
    coreGroup.add(coreRing);
    
    group.add(coreGroup);

    // ------------------ 2. POINT OF SALE (POS) NODE (Blue) ------------------
    const posGroup = new THREE.Group();
    posGroup.position.set(-2.2, 0, 0);

    const posMat = new THREE.MeshPhongMaterial({
        color: 0x3b82f6,
        emissive: 0x1d4ed8,
        wireframe: true,
        transparent: true,
        opacity: 0.9
    });

    // POS Screen/Tablet
    const screenGeo = new THREE.BoxGeometry(0.9, 0.6, 0.08);
    const screenMesh = new THREE.Mesh(screenGeo, posMat);
    screenMesh.rotation.x = -Math.PI / 6; // tilted back
    screenMesh.position.y = 0.15;
    posGroup.add(screenMesh);

    // POS Base
    const baseGeo = new THREE.BoxGeometry(0.7, 0.12, 0.5);
    const baseMesh = new THREE.Mesh(baseGeo, posMat);
    baseMesh.position.y = -0.22;
    posGroup.add(baseMesh);

    group.add(posGroup);

    // ------------------ 3. ATTENDANCE NODE (Purple) ------------------
    const attGroup = new THREE.Group();
    attGroup.position.set(2.2, 0, 0);

    const attMat = new THREE.MeshPhongMaterial({
        color: 0x8b5cf6,
        emissive: 0x6d28d9,
        wireframe: true,
        transparent: true,
        opacity: 0.9
    });

    // Pin Head (Sphere)
    const pinHeadGeo = new THREE.SphereGeometry(0.32, 16, 16);
    const pinHead = new THREE.Mesh(pinHeadGeo, attMat);
    pinHead.position.y = 0.22;
    attGroup.add(pinHead);

    // Pin Point (Cone)
    const pinPointGeo = new THREE.ConeGeometry(0.18, 0.38, 16);
    const pinPoint = new THREE.Mesh(pinPointGeo, attMat);
    pinPoint.rotation.x = Math.PI; // point downwards
    pinPoint.position.y = -0.05;
    attGroup.add(pinPoint);

    // Clock Ring around the pin head
    const clockRingGeo = new THREE.TorusGeometry(0.52, 0.03, 8, 32);
    const clockRing = new THREE.Mesh(clockRingGeo, attMat);
    clockRing.position.y = 0.22;
    attGroup.add(clockRing);

    group.add(attGroup);

    // ------------------ 4. CONNECTION LINES (Grey) ------------------
    const lineMat = new THREE.LineBasicMaterial({
        color: 0x9ca3af,
        transparent: true,
        opacity: 0.25
    });

    const points = [];
    points.push(new THREE.Vector3(-2.2, 0, 0));
    points.push(new THREE.Vector3(0, 0, 0));
    points.push(new THREE.Vector3(2.2, 0, 0));

    const lineGeo = new THREE.BufferGeometry().setFromPoints(points);
    const line = new THREE.Line(lineGeo, lineMat);
    group.add(line);

    // ------------------ 5. REAL-TIME DATA SYNC PARTICLES ------------------
    const pGeo = new THREE.SphereGeometry(0.065, 8, 8);
    const pMat1 = new THREE.MeshBasicMaterial({ color: 0x60a5fa }); // Blue glow particle
    const pMat2 = new THREE.MeshBasicMaterial({ color: 0xc084fc }); // Purple glow particle

    const syncParticle1 = new THREE.Mesh(pGeo, pMat1);
    const syncParticle2 = new THREE.Mesh(pGeo, pMat2);
    
    group.add(syncParticle1);
    group.add(syncParticle2);

    scene.add(group);

    // Mouse movement variables
    let mouseX = 0;
    let mouseY = 0;
    let targetX = 0;
    let targetY = 0;

    window.addEventListener('mousemove', (event) => {
        mouseX = (event.clientX / window.innerWidth) - 0.5;
        mouseY = (event.clientY / window.innerHeight) - 0.5;
    });

    // Resize event
    window.addEventListener('resize', resize);

    // Animation Loop
    const clock = new THREE.Clock();
    
    function animate() {
        requestAnimationFrame(animate);

        const elapsedTime = clock.getElapsedTime();

        // Hover Levitation Effect
        group.position.y = Math.sin(elapsedTime * 1.4) * 0.2;

        // Core animation (rotates on double axis)
        coreGroup.rotation.y = elapsedTime * 0.4;
        coreRing.rotation.y = -elapsedTime * 0.8;

        // POS terminal tilt back and forth slightly
        posGroup.rotation.y = Math.sin(elapsedTime * 0.8) * 0.15;
        posGroup.rotation.z = Math.cos(elapsedTime * 0.5) * 0.05;

        // Attendance Pin rotate continuously
        attGroup.rotation.y = elapsedTime * 0.6;
        clockRing.rotation.z = -elapsedTime * 0.3;

        // Animate Sync Particles along connection paths
        // Particle 1: POS -> Core
        const progress1 = (Math.sin(elapsedTime * 1.8) + 1) / 2; // values from 0 to 1
        syncParticle1.position.set(-2.2 + (progress1 * 2.2), 0, 0);

        // Particle 2: Core -> Attendance
        const progress2 = (Math.cos(elapsedTime * 2.2) + 1) / 2; // values from 0 to 1
        syncParticle2.position.set(progress2 * 2.2, 0, 0);

        // Interactive mouse tilt with smooth interpolation (damping)
        targetX += (mouseX - targetX) * 0.05;
        targetY += (mouseY - targetY) * 0.05;

        group.rotation.y = targetX * 1.2;
        group.rotation.x = targetY * 1.2;

        renderer.render(scene, camera);
    }

    animate();
})();

// ==================== 3D DASHBOARD TILT ====================
(function() {
    const card = document.querySelector('.hero-mockup');
    const heroVisual = document.querySelector('.hero-visual');
    if (!card || !heroVisual) return;

    heroVisual.addEventListener('mousemove', (e) => {
        const rect = card.getBoundingClientRect();
        const x = e.clientX - rect.left - rect.width / 2;
        const y = e.clientY - rect.top - rect.height / 2;

        // Max rotation 12 degrees
        const rotX = -(y / (rect.height / 2)) * 12;
        const rotY = (x / (rect.width / 2)) * 12;

        card.style.transform = `rotateX(${rotX}deg) rotateY(${rotY}deg) scale(1.02)`;
        card.style.boxShadow = `
            ${-rotY * 1.5}px ${rotX * 1.5}px 35px rgba(0, 0, 0, 0.35),
            0 50px 100px -20px rgba(0, 0, 0, 0.3),
            0 0 0 1px rgba(255, 255, 255, 0.15) inset
        `;
    });

    heroVisual.addEventListener('mouseleave', () => {
        card.style.transform = 'rotateX(0deg) rotateY(0deg) scale(1)';
        card.style.boxShadow = '0 50px 100px -20px rgba(0,0,0,0.25), 0 0 0 1px rgba(255,255,255,0.1) inset';
    });
})();

