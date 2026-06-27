<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ConcertPass</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css">
<style>
*{box-sizing:border-box;margin:0;padding:0}
body{font-family:var(--font-sans,'system-ui',sans-serif);background:var(--surface-0,#f1efe8);color:var(--text-primary,#1a1a18);min-height:100vh}
.hidden{display:none!important}
#app{min-height:100vh}

/* NAV */
nav{background:var(--surface-2,#fff);border-bottom:0.5px solid var(--border,rgba(0,0,0,.12));padding:0 1.5rem;display:flex;align-items:center;justify-content:space-between;height:56px;position:sticky;top:0;z-index:100}
.nav-logo{font-size:17px;font-weight:500;display:flex;align-items:center;gap:8px;color:var(--text-primary)}
.nav-logo i{color:#534AB7}
.nav-tabs{display:flex;gap:4px}
.nav-tab{padding:6px 14px;border-radius:var(--radius,8px);font-size:14px;cursor:pointer;border:none;background:transparent;color:var(--text-secondary,#5f5e5a);transition:background .15s,color .15s}
.nav-tab:hover{background:var(--surface-1,#f1efe8);color:var(--text-primary)}
.nav-tab.active{background:var(--bg-accent,#e6f1fb);color:var(--text-accent,#185fa5);font-weight:500}
.nav-right{display:flex;align-items:center;gap:8px}
.badge-staff{font-size:11px;padding:3px 8px;border-radius:99px;background:#eeedfe;color:#534AB7;font-weight:500}
.btn{padding:7px 14px;border-radius:var(--radius,8px);border:0.5px solid var(--border-strong,rgba(0,0,0,.2));cursor:pointer;font-size:13px;background:transparent;color:var(--text-primary);transition:background .15s;font-family:inherit}
.btn:hover{background:var(--surface-1)}
.btn-primary{background:#534AB7;color:#fff;border-color:transparent}
.btn-primary:hover{background:#3C3489}
.btn-danger{background:#A32D2D;color:#fff;border-color:transparent}
.btn-danger:hover{background:#791F1F}
.btn-success{background:#0F6E56;color:#fff;border-color:transparent}
.btn-success:hover{background:#085041}
.btn-sm{padding:4px 10px;font-size:12px}

/* PAGES */
.page{padding:2rem 1.5rem;max-width:1000px;margin:0 auto}

/* WELCOME SCREEN */
#welcome-screen{display:flex;flex-direction:column;align-items:center;justify-content:center;min-height:calc(100vh - 56px);text-align:center;padding:2rem}
.welcome-icon{font-size:64px;color:#534AB7;margin-bottom:1.5rem}
.welcome-title{font-size:28px;font-weight:500;margin-bottom:.75rem}
.welcome-sub{color:var(--text-secondary);font-size:16px;max-width:420px;line-height:1.6;margin-bottom:2rem}
.welcome-actions{display:flex;gap:12px;flex-wrap:wrap;justify-content:center}

/* CONCERTS GRID */
.concerts-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(280px,1fr));gap:1rem;margin-top:1rem}
.concert-card{background:var(--surface-2,#fff);border-radius:12px;border:0.5px solid var(--border);overflow:hidden;cursor:pointer;transition:border-color .15s}
.concert-card:hover{border-color:var(--border-accent,#378ADD)}
.concert-img{width:100%;height:160px;object-fit:cover;background:linear-gradient(135deg,#eeedfe,#AFA9EC);display:flex;align-items:center;justify-content:center;font-size:48px}
.concert-body{padding:1rem}
.concert-name{font-size:15px;font-weight:500;margin-bottom:4px}
.concert-desc{font-size:13px;color:var(--text-secondary);margin-bottom:.75rem;line-height:1.5;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}
.concert-meta{display:flex;justify-content:space-between;align-items:center}
.concert-price{font-size:13px;font-weight:500;color:#0F6E56}
.concert-date{font-size:12px;color:var(--text-muted,#888780)}
.tag{font-size:11px;padding:2px 8px;border-radius:99px;display:inline-flex;align-items:center;gap:4px}
.tag-free{background:#eaf3de;color:#3B6D11}
.tag-paid{background:#faeeda;color:#854F0B}

/* MODAL */
.modal-bg{position:fixed;inset:0;background:rgba(0,0,0,.45);z-index:200;display:flex;align-items:center;justify-content:center;padding:1rem}
.modal{background:var(--surface-2,#fff);border-radius:12px;border:0.5px solid var(--border);width:100%;max-width:480px;max-height:90vh;overflow-y:auto;padding:1.5rem}
.modal-header{display:flex;justify-content:space-between;align-items:center;margin-bottom:1.25rem}
.modal-title{font-size:17px;font-weight:500}
.close-btn{background:none;border:none;cursor:pointer;color:var(--text-secondary);font-size:20px;padding:2px}
.close-btn:hover{color:var(--text-primary)}

/* FORM */
.form-group{margin-bottom:1rem}
label{display:block;font-size:13px;color:var(--text-secondary);margin-bottom:4px}
input,textarea,select{width:100%;padding:8px 10px;border-radius:var(--radius,8px);border:0.5px solid var(--border-strong);font-size:14px;background:var(--surface-2,#fff);color:var(--text-primary);font-family:inherit}
input:focus,textarea:focus,select:focus{outline:none;border-color:#534AB7}
textarea{resize:vertical;min-height:80px}
.form-row{display:grid;grid-template-columns:1fr 1fr;gap:.75rem}

/* TICKET */
.ticket{background:var(--surface-2,#fff);border:0.5px solid var(--border);border-radius:12px;overflow:hidden;margin-bottom:.75rem}
.ticket-header{background:#eeedfe;padding:.75rem 1rem;display:flex;justify-content:space-between;align-items:center}
.ticket-title{font-size:14px;font-weight:500;color:#3C3489}
.ticket-body{padding:.75rem 1rem}
.ticket-code{font-family:monospace;font-size:18px;font-weight:500;color:#534AB7;letter-spacing:3px;margin:.5rem 0}
.ticket-meta{font-size:12px;color:var(--text-secondary);line-height:1.7}
.ticket-valid{color:#0F6E56;font-weight:500}
.ticket-invalid{color:#A32D2D;font-weight:500}

/* STAFF PANEL */
.panel-tabs{display:flex;gap:4px;margin-bottom:1.5rem;background:var(--surface-1,#f1efe8);padding:4px;border-radius:10px;width:fit-content}
.panel-tab{padding:7px 16px;border-radius:8px;font-size:13px;cursor:pointer;border:none;background:transparent;color:var(--text-secondary);font-family:inherit;transition:background .15s}
.panel-tab.active{background:var(--surface-2,#fff);color:var(--text-primary);font-weight:500;box-shadow:0 1px 3px rgba(0,0,0,.08)}
.section-title{font-size:16px;font-weight:500;margin-bottom:1rem}
.empty-state{text-align:center;padding:3rem;color:var(--text-muted)}
.empty-state i{font-size:40px;display:block;margin-bottom:.75rem}

/* SCAN RESULT */
.scan-result{padding:1rem;border-radius:12px;margin-top:1rem;display:flex;align-items:flex-start;gap:12px}
.scan-valid{background:#eaf3de;border:0.5px solid #C0DD97}
.scan-invalid{background:#fcebeb;border:0.5px solid #F7C1C1}
.scan-icon{font-size:28px;margin-top:2px}

/* TABLE */
.data-table{width:100%;border-collapse:collapse;font-size:13px}
.data-table th{text-align:left;padding:8px 12px;font-size:12px;color:var(--text-secondary);border-bottom:0.5px solid var(--border);font-weight:500}
.data-table td{padding:10px 12px;border-bottom:0.5px solid var(--border);vertical-align:middle}
.data-table tr:last-child td{border-bottom:none}

/* AUTH */
.auth-box{background:var(--surface-2,#fff);border-radius:12px;border:0.5px solid var(--border);padding:2rem;max-width:380px;margin:4rem auto}
.auth-icon{font-size:40px;color:#534AB7;text-align:center;margin-bottom:1rem}
.auth-title{font-size:18px;font-weight:500;text-align:center;margin-bottom:.5rem}
.auth-sub{font-size:13px;color:var(--text-secondary);text-align:center;margin-bottom:1.5rem}

/* TICKET GENERATION SUCCESS */
.success-box{background:#eaf3de;border:0.5px solid #C0DD97;border-radius:12px;padding:1.5rem;text-align:center;margin-top:1rem}
.success-icon{font-size:36px;color:#0F6E56;margin-bottom:.5rem}

/* BILLET PAGE */
.billet-container{max-width:500px;margin:0 auto;padding:2rem 1rem}
.big-ticket{background:var(--surface-2,#fff);border-radius:16px;border:2px dashed #AFA9EC;padding:1.5rem;position:relative;margin-bottom:1rem}
.big-ticket::before{content:'';position:absolute;left:-1px;top:50%;transform:translateY(-50%);width:20px;height:20px;border-radius:50%;background:var(--surface-0,#f1efe8)}
.big-ticket::after{content:'';position:absolute;right:-1px;top:50%;transform:translateY(-50%);width:20px;height:20px;border-radius:50%;background:var(--surface-0,#f1efe8)}
.big-code{font-size:28px;font-family:monospace;letter-spacing:6px;font-weight:500;color:#534AB7;margin:1rem 0}

@media(max-width:600px){.form-row{grid-template-columns:1fr}.concerts-grid{grid-template-columns:1fr}}
</style>
</head>
<body>
<div id="app">
<nav>
  <div class="nav-logo"><i class="ti ti-music" aria-hidden="true"></i> ConcertPass</div>
  <div class="nav-tabs" id="nav-tabs"></div>
  <div class="nav-right" id="nav-right"></div>
</nav>
<div id="main-content"></div>
</div>

<!-- MODALS -->
<div class="modal-bg hidden" id="modal-bg">
  <div class="modal" id="modal-inner"></div>
</div>

<script>
const DB = {
  async concerts() {
    const res = await fetch('api/get_concerts.php');
    return await res.json();
  },
  async tickets() {
    const res = await fetch('api/get_tickets.php');
    return await res.json();
  }
};
const STAFF_CODE = 'staff.2026.**eclipsearéna+fr';
let currentView = 'home';
let isStaff = false;
let staffPanelTab = 'concerts';

function uid(){return Math.random().toString(36).substr(2,9).toUpperCase()}
function ticketCode(){
  let s='';
  const chars='ABCDEFGHJKLMNPQRSTUVWXYZ23456789';
  for(let i=0;i<12;i++){
    if(i&&i%4===0)s+='-';
    s+=chars[Math.floor(Math.random()*chars.length)];
  }
  return s;
}
function esc(s){return String(s).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;')}

// ─── NAV ───
function renderNav(){
  const tabs = document.getElementById('nav-tabs');
  const right = document.getElementById('nav-right');
  const concerts = DB.concerts();
  let tabsHtml = `<button class="nav-tab ${currentView==='home'?'active':''}" onclick="navigate('home')"><i class="ti ti-home"></i> Accueil</button>`;
  if(concerts.length>0){
    tabsHtml += `<button class="nav-tab ${currentView==='concerts'?'active':''}" onclick="navigate('concerts')"><i class="ti ti-ticket"></i> Concerts</button>`;
    tabsHtml += `<button class="nav-tab ${currentView==='reserve'?'active':''}" onclick="navigate('reserve')"><i class="ti ti-user-check"></i> Ma réservation</button>`;
  }
  if(isStaff){
    tabsHtml += `<button class="nav-tab ${currentView==='staff'?'active':''}" onclick="navigate('staff')"><i class="ti ti-settings"></i> Staff</button>`;
  }
  tabs.innerHTML = tabsHtml;
  let rightHtml = '';
  if(isStaff) rightHtml += `<span class="badge-staff"><i class="ti ti-star" aria-hidden="true"></i> Staff</span>`;
  if(!isStaff) rightHtml += `<button class="btn btn-sm" onclick="showStaffLogin()"><i class="ti ti-lock"></i> Staff</button>`;
  else rightHtml += `<button class="btn btn-sm" onclick="logoutStaff()">Déconnexion</button>`;
  right.innerHTML = rightHtml;
}

function navigate(view){
  currentView = view;
  renderNav();
  renderPage();
}

// ─── PAGES ───
function renderPage(){
  const mc = document.getElementById('main-content');
  switch(currentView){
    case 'home': mc.innerHTML = renderHome(); break;
    case 'concerts': mc.innerHTML = renderConcerts(); break;
    case 'reserve': mc.innerHTML = renderReserve(); break;
    case 'staff': mc.innerHTML = renderStaff(); break;
    default: mc.innerHTML = renderHome();
  }
}

function renderHome(){
  const concerts = DB.concerts();
  if(concerts.length===0){
    return `<div id="welcome-screen">
      <i class="ti ti-music welcome-icon" aria-hidden="true"></i>
      <h1 class="welcome-title">Bienvenue sur ConcertPass</h1>
      <p class="welcome-sub">Aucun événement n'est encore programmé. Revenez bientôt ou connectez-vous en tant que staff pour ajouter des spectacles.</p>
      <div class="welcome-actions">
        <button class="btn btn-primary" onclick="showStaffLogin()"><i class="ti ti-lock"></i> Connexion Staff</button>
      </div>
    </div>`;
  }
  return `<div class="page">
    <h2 style="font-size:22px;font-weight:500;margin-bottom:.25rem">Événements à venir</h2>
    <p style="color:var(--text-secondary);font-size:14px;margin-bottom:1.5rem">${concerts.length} concert(s) disponible(s)</p>
    <div class="concerts-grid">${concerts.map(c=>concertCard(c,true)).join('')}</div>
  </div>`;
}

function concertCard(c, clickable){
  const img = c.image ? `<img src="${esc(c.image)}" style="width:100%;height:160px;object-fit:cover" alt="${esc(c.name)}" onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
  <div class="concert-img" style="display:none"><i class="ti ti-music" aria-hidden="true"></i></div>` : `<div class="concert-img"><i class="ti ti-music" aria-hidden="true"></i></div>`;
  return `<div class="concert-card" ${clickable?`onclick="openConcertModal('${c.id}')"`:''}>
    ${img}
    <div class="concert-body">
      <div class="concert-name">${esc(c.name)}</div>
      <div class="concert-desc">${esc(c.description||'')}</div>
      <div class="concert-meta">
        <span class="concert-date"><i class="ti ti-calendar" aria-hidden="true"></i> ${esc(c.date||'Date TBA')}</span>
        <span class="tag ${c.price==='0'||c.price===''?'tag-free':'tag-paid'}">${c.price==='0'||c.price===''?'Gratuit':'Payant'}</span>
      </div>
    </div>
  </div>`;
}

function renderConcerts(){
  const concerts = DB.concerts();
  if(!concerts.length) return `<div class="page"><div class="empty-state"><i class="ti ti-music-off" aria-hidden="true"></i>Aucun concert disponible</div></div>`;
  return `<div class="page">
    <h2 style="font-size:22px;font-weight:500;margin-bottom:1.5rem">Tous les concerts</h2>
    <div class="concerts-grid">${concerts.map(c=>concertCard(c,true)).join('')}</div>
  </div>`;
}

function renderReserve(){
  return `<div class="page" style="max-width:600px">
    <h2 style="font-size:22px;font-weight:500;margin-bottom:.5rem">Ma réservation</h2>
    <p style="color:var(--text-secondary);font-size:14px;margin-bottom:1.5rem">Entrez votre code de billet pour le consulter</p>
    <div style="background:var(--surface-2,#fff);border:0.5px solid var(--border);border-radius:12px;padding:1.5rem">
      <div class="form-group">
        <label>Code de billet</label>
        <input type="text" id="lookup-code" placeholder="XXXX-XXXX-XXXX" style="font-family:monospace;font-size:16px;letter-spacing:2px" oninput="this.value=this.value.toUpperCase()">
      </div>
      <button class="btn btn-primary" onclick="lookupTicket()">Chercher mon billet</button>
    </div>
    <div id="lookup-result"></div>
  </div>`;
}

// ─── STAFF PANEL ───
function renderStaff(){
  if(!isStaff) return `<div class="page"><div class="auth-box">
    <div class="auth-icon"><i class="ti ti-lock" aria-hidden="true"></i></div>
    <div class="auth-title">Accès restreint</div>
    <div class="auth-sub">Cette section est réservée au staff.</div>
    <button class="btn btn-primary" style="width:100%" onclick="showStaffLogin()">Se connecter</button>
  </div></div>`;

  const tabs = ['concerts','billets','scan'];
  const tabLabels = {'concerts':'Concerts','billets':'Billets','scan':'Scanner'};
  const tabIcons = {'concerts':'ti-music','billets':'ti-ticket','scan':'ti-scan'};
  const tabsHtml = tabs.map(t=>`<button class="panel-tab ${staffPanelTab===t?'active':''}" onclick="switchPanelTab('${t}')"><i class="ti ${tabIcons[t]}" aria-hidden="true"></i> ${tabLabels[t]}</button>`).join('');

  let content = '';
  if(staffPanelTab==='concerts') content = renderStaffConcerts();
  if(staffPanelTab==='billets') content = renderStaffBillets();
  if(staffPanelTab==='scan') content = renderScan();

  return `<div class="page">
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1.5rem">
      <h2 style="font-size:22px;font-weight:500">Panel Staff</h2>
      <span class="badge-staff"><i class="ti ti-star" aria-hidden="true"></i> Connecté</span>
    </div>
    <div class="panel-tabs">${tabsHtml}</div>
    ${content}
  </div>`;
}

function renderStaffConcerts(){
  const concerts = DB.concerts();
  return `<div>
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1rem">
      <div class="section-title" style="margin:0">${concerts.length} concert(s)</div>
      <button class="btn btn-primary btn-sm" onclick="showAddConcert()"><i class="ti ti-plus"></i> Ajouter</button>
    </div>
    ${concerts.length===0?`<div class="empty-state"><i class="ti ti-music-off" aria-hidden="true"></i>Aucun concert. Ajoutez-en un !</div>`:`
    <table class="data-table">
      <thead><tr><th>Nom</th><th>Date</th><th>Lieu</th><th>Prix</th><th>Actions</th></tr></thead>
      <tbody>${concerts.map(c=>`<tr>
        <td><strong>${esc(c.name)}</strong></td>
        <td>${esc(c.date||'—')}</td>
        <td>${esc(c.lieu||'—')}</td>
        <td>${c.price==='0'||!c.price?'<span class="tag tag-free">Gratuit</span>':`<span class="tag tag-paid">${esc(c.price)}€</span>`}</td>
        <td>
          <button class="btn btn-sm btn-danger" onclick="deleteConcert('${c.id}')"><i class="ti ti-trash"></i></button>
          <button class="btn btn-sm" onclick="editConcert('${c.id}')" style="margin-left:4px"><i class="ti ti-edit"></i></button>
        </td>
      </tr>`).join('')}</tbody>
    </table>`}
  </div>`;
}

function renderStaffBillets(){
  const tickets = DB.tickets();
  return `<div>
    <div class="section-title">${tickets.length} billet(s) émis</div>
    ${tickets.length===0?`<div class="empty-state"><i class="ti ti-ticket" aria-hidden="true"></i>Aucun billet émis</div>`:`
    <table class="data-table">
      <thead><tr><th>Code</th><th>Concert</th><th>Pseudo RP</th><th>Discord</th><th>Statut</th><th>Actions</th></tr></thead>
      <tbody>${tickets.map(t=>`<tr>
        <td><code style="font-size:12px;letter-spacing:1px;color:#534AB7">${esc(t.code)}</code></td>
        <td>${esc(t.concertName)}</td>
        <td>${esc(t.pseudoRP)}</td>
        <td>${esc(t.discord)}</td>
        <td>${t.used?`<span style="color:#A32D2D;font-size:12px;font-weight:500"><i class="ti ti-x"></i> Scanné</span>`:`<span style="color:#0F6E56;font-size:12px;font-weight:500"><i class="ti ti-check"></i> Valide</span>`}</td>
        <td>
          <button class="btn btn-sm btn-danger" onclick="deleteTicket('${t.code}')"><i class="ti ti-trash"></i></button>
        </td>
      </tr>`).join('')}</tbody>
    </table>`}
  </div>`;
}

function renderScan(){
  return `<div style="max-width:440px">
    <div class="section-title">Scanner un billet</div>
    <div style="background:var(--surface-2,#fff);border:0.5px solid var(--border);border-radius:12px;padding:1.5rem">
      <div class="form-group">
        <label>Code du billet</label>
        <input type="text" id="scan-input" placeholder="XXXX-XXXX-XXXX" style="font-family:monospace;font-size:18px;letter-spacing:3px;text-align:center" oninput="this.value=this.value.toUpperCase()">
      </div>
      <button class="btn btn-primary" style="width:100%" onclick="scanTicket()"><i class="ti ti-scan"></i> Vérifier le billet</button>
    </div>
    <div id="scan-result"></div>
  </div>`;
}

// ─── MODAL ───
function openModal(html){
  document.getElementById('modal-inner').innerHTML = html;
  document.getElementById('modal-bg').classList.remove('hidden');
}
function closeModal(){
  document.getElementById('modal-bg').classList.add('hidden');
}
document.getElementById('modal-bg').addEventListener('click',function(e){
  if(e.target===this) closeModal();
});

// ─── STAFF AUTH ───
function showStaffLogin(){
  openModal(`<div class="modal-header">
    <span class="modal-title"><i class="ti ti-lock"></i> Connexion Staff</span>
    <button class="close-btn" onclick="closeModal()"><i class="ti ti-x"></i></button>
  </div>
  <div class="auth-icon" style="font-size:36px;margin-bottom:1rem"><i class="ti ti-shield-lock" aria-hidden="true"></i></div>
  <p style="color:var(--text-secondary);font-size:13px;margin-bottom:1rem;text-align:center">Entrez le code sécurité staff</p>
  <div class="form-group">
    <label>Code sécurité</label>
    <input type="password" id="staff-code-input" placeholder="••••••••" onkeydown="if(event.key==='Enter')loginStaff()">
  </div>
  <div id="login-error" style="color:#A32D2D;font-size:13px;margin-bottom:.75rem;display:none"><i class="ti ti-alert-circle"></i> Code incorrect</div>
  <button class="btn btn-primary" style="width:100%" onclick="loginStaff()"><i class="ti ti-login"></i> Se connecter</button>`);
  setTimeout(()=>document.getElementById('staff-code-input')?.focus(),100);
}

function loginStaff(){
  const v = document.getElementById('staff-code-input')?.value;
  if(v===STAFF_CODE){
    isStaff=true;
    closeModal();
    navigate('staff');
  } else {
    document.getElementById('login-error').style.display='block';
  }
}

function logoutStaff(){
  isStaff=false;
  navigate('home');
}

// ─── CONCERTS ───
function showAddConcert(id){
  const concerts = DB.concerts();
  const c = id ? concerts.find(x=>x.id===id) : null;
  openModal(`<div class="modal-header">
    <span class="modal-title">${c?'Modifier':'Ajouter'} un concert</span>
    <button class="close-btn" onclick="closeModal()"><i class="ti ti-x"></i></button>
  </div>
  <div class="form-group"><label>Nom de l'événement *</label><input type="text" id="c-name" value="${esc(c?.name||'')}" placeholder="Festival Neon 2025"></div>
  <div class="form-group"><label>Description</label><textarea id="c-desc" placeholder="Une soirée inoubliable...">${esc(c?.description||'')}</textarea></div>
  <div class="form-row">
    <div class="form-group"><label>Date</label><input type="date" id="c-date" value="${esc(c?.date||'')}"></div>
    <div class="form-group"><label>Lieu</label><input type="text" id="c-lieu" value="${esc(c?.lieu||'')}" placeholder="Salle Olympia"></div>
  </div>
  <div class="form-row">
    <div class="form-group"><label>Prix (0 = gratuit)</label><input type="number" id="c-price" value="${esc(c?.price||'0')}" min="0" placeholder="0"></div>
    <div class="form-group"><label>Capacité</label><input type="number" id="c-capacity" value="${esc(c?.capacity||'')}" placeholder="500"></div>
  </div>
  <div class="form-group"><label>URL Image</label><input type="url" id="c-image" value="${esc(c?.image||'')}" placeholder="https://..."></div>
  <div id="save-err" style="color:#A32D2D;font-size:13px;margin-bottom:.75rem;display:none">Le nom est obligatoire</div>
  <button class="btn btn-primary" style="width:100%" onclick="saveConcert('${c?.id||''}')"><i class="ti ti-check"></i> ${c?'Enregistrer':'Créer le concert'}</button>`);
}

function editConcert(id){ showAddConcert(id); }

function saveConcert(id){
  const name = document.getElementById('c-name')?.value.trim();
  if(!name){document.getElementById('save-err').style.display='block';return;}
  const concerts = DB.concerts();
  const obj = {
    id: id||uid(),
    name,
    description: document.getElementById('c-desc')?.value.trim(),
    date: document.getElementById('c-date')?.value,
    lieu: document.getElementById('c-lieu')?.value.trim(),
    price: document.getElementById('c-price')?.value||'0',
    capacity: document.getElementById('c-capacity')?.value||'',
    image: document.getElementById('c-image')?.value.trim(),
    createdAt: id ? (concerts.find(c=>c.id===id)?.createdAt||Date.now()) : Date.now()
  };
  if(id){
    const i = concerts.findIndex(c=>c.id===id);
    if(i>=0) concerts[i]=obj; else concerts.push(obj);
  } else concerts.push(obj);
  DB.saveConcerts(concerts);
  closeModal();
  renderNav();
  renderPage();
}

function deleteConcert(id){
  if(!confirm('Supprimer ce concert ?')) return;
  DB.saveConcerts(DB.concerts().filter(c=>c.id!==id));
  renderPage();
}

// ─── RESERVATION ───
function openConcertModal(id){
  const c = DB.concerts().find(x=>x.id===id);
  if(!c) return;
  const img = c.image ? `<img src="${esc(c.image)}" style="width:100%;border-radius:8px;max-height:200px;object-fit:cover;margin-bottom:1rem" alt="${esc(c.name)}" onerror="this.style.display='none'">` : '';
  openModal(`<div class="modal-header">
    <span class="modal-title">${esc(c.name)}</span>
    <button class="close-btn" onclick="closeModal()"><i class="ti ti-x"></i></button>
  </div>
  ${img}
  <p style="color:var(--text-secondary);font-size:14px;margin-bottom:1rem;line-height:1.6">${esc(c.description||'')}</p>
  <div style="display:grid;grid-template-columns:1fr 1fr;gap:.5rem;margin-bottom:1rem;font-size:13px">
    ${c.date?`<div><i class="ti ti-calendar" aria-hidden="true"></i> ${esc(c.date)}</div>`:''}
    ${c.lieu?`<div><i class="ti ti-map-pin" aria-hidden="true"></i> ${esc(c.lieu)}</div>`:''}
    ${c.capacity?`<div><i class="ti ti-users" aria-hidden="true"></i> Cap. ${esc(c.capacity)}</div>`:''}
    <div><i class="ti ti-ticket" aria-hidden="true"></i> ${c.price==='0'||!c.price?'Gratuit':`${esc(c.price)}€`}</div>
  </div>
  <hr style="border:none;border-top:0.5px solid var(--border);margin-bottom:1rem">
  <p style="font-size:13px;font-weight:500;margin-bottom:.75rem">Réserver une place gratuitement</p>
  <div class="form-group"><label>Pseudo RP *</label><input type="text" id="rp-pseudo" placeholder="Votre pseudo roleplay"></div>
  <div class="form-group"><label>Discord *</label><input type="text" id="rp-discord" placeholder="Username#0000 ou @username"></div>
  <div id="res-err" style="color:#A32D2D;font-size:13px;margin-bottom:.75rem;display:none">Remplissez tous les champs</div>
  <div id="res-success"></div>
  <button class="btn btn-primary" style="width:100%" onclick=async function reserveTicket(concertId, concertName) {
  const pseudo = document.getElementById('rp-pseudo')?.value.trim();
  const discord = document.getElementById('rp-discord')?.value.trim();
  
  if(!pseudo || !discord) {
    document.getElementById('res-err').style.display='block';
    return;
  }
  document.getElementById('res-err').style.display='none';

  // Préparation des données pour le serveur
  const formData = new FormData();
  formData.append('concert_id', concertId);
  formData.append('pseudo_rp', pseudo);
  formData.append('discord', discord);

  try {
    // Appel au serveur PHP
    const response = await fetch('api/reserver.php', {
      method: 'POST',
      body: formData
    });
    const data = await response.json();

    if(data.status === 'success') {
      document.getElementById('res-success').innerHTML = `
        <div class="success-box">
          <div class="success-icon"><i class="ti ti-circle-check" aria-hidden="true"></i></div>
          <p style="font-weight:500;color:#0F6E56;margin-bottom:.5rem">Billet réservé !</p>
          <div class="big-code">${data.code}</div>
          <p style="font-size:12px;color:#3B6D11">Enregistré sur le serveur.</p>
        </div>`;
      document.querySelector('#modal-inner .btn-primary').style.display='none';
    } else {
      alert('Erreur : ' + data.message);
    }
  } catch (error) {
    alert('Impossible de contacter le serveur.');
  }
}}

// ─── LOOKUP ───
function lookupTicket(){
  const code = document.getElementById('lookup-code')?.value.trim().toUpperCase();
  if(!code){return;}
  const tickets = DB.tickets();
  const t = tickets.find(x=>x.code===code);
  const container = document.getElementById('lookup-result');
  if(!t){
    container.innerHTML=`<div class="scan-result scan-invalid"><i class="ti ti-x-circle scan-icon" style="color:#A32D2D" aria-hidden="true"></i><div><strong style="color:#A32D2D">Billet introuvable</strong><br><span style="font-size:13px">Ce code ne correspond à aucun billet dans notre système.</span></div></div>`;
    return;
  }
  const d = new Date(t.issuedAt).toLocaleString('fr-FR');
  container.innerHTML=`<div style="background:var(--surface-2,#fff);border:0.5px solid var(--border);border-radius:12px;padding:1.25rem;margin-top:1rem">
    <div style="display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:.75rem">
      <div><div style="font-size:15px;font-weight:500">${esc(t.concertName)}</div><div style="font-size:12px;color:var(--text-secondary)">Émis le ${d}</div></div>
      <span class="${t.used?'ticket-invalid':'ticket-valid'}" style="font-size:12px">${t.used?'⛔ Déjà scanné':'✅ Valide'}</span>
    </div>
    <div class="ticket-code">${esc(t.code)}</div>
    <div style="font-size:13px;color:var(--text-secondary);line-height:1.8">
      Pseudo RP : <strong>${esc(t.pseudoRP)}</strong><br>
      Discord : <strong>${esc(t.discord)}</strong>
    </div>
  </div>`;
}

// ─── SCAN ───
function scanTicket(){
  const code = document.getElementById('scan-input')?.value.trim().toUpperCase();
  const container = document.getElementById('scan-result');
  if(!code){container.innerHTML='';return;}
  const tickets = DB.tickets();
  const idx = tickets.findIndex(x=>x.code===code);
  if(idx<0){
    container.innerHTML=`<div class="scan-result scan-invalid"><i class="ti ti-x-circle scan-icon" style="color:#A32D2D" aria-hidden="true"></i><div><strong style="color:#A32D2D">Billet introuvable</strong><br><span style="font-size:13px;color:#A32D2D">Ce code n'existe pas dans la base.</span></div></div>`;
    return;
  }
  const t = tickets[idx];
  if(t.used){
    container.innerHTML=`<div class="scan-result scan-invalid"><i class="ti ti-ban scan-icon" style="color:#A32D2D" aria-hidden="true"></i><div><strong style="color:#A32D2D">Billet déjà utilisé</strong><br><span style="font-size:13px;color:#A32D2D">Ce billet a déjà été scanné. Entrée refusée.</span><br><span style="font-size:12px;color:var(--text-muted)">Concert : ${esc(t.concertName)} • ${esc(t.pseudoRP)}</span></div></div>`;
    return;
  }
  tickets[idx].used = true;
  tickets[idx].scannedAt = Date.now();
  DB.saveTickets(tickets);
  container.innerHTML=`<div class="scan-result scan-valid"><i class="ti ti-circle-check scan-icon" style="color:#0F6E56" aria-hidden="true"></i><div><strong style="color:#0F6E56">Billet valide — Entrée accordée !</strong><br><span style="font-size:13px;color:#3B6D11">Concert : <strong>${esc(t.concertName)}</strong></span><br><span style="font-size:13px;color:#3B6D11">Pseudo RP : <strong>${esc(t.pseudoRP)}</strong> • Discord : <strong>${esc(t.discord)}</strong></span><br><span style="font-size:12px;color:#3B6D11;margin-top:4px;display:block">Billet marqué comme utilisé</span></div></div>`;
  document.getElementById('scan-input').value='';
}

// ─── TICKETS STAFF ───
function deleteTicket(code){
  if(!confirm('Supprimer ce billet définitivement ?')) return;
  DB.saveTickets(DB.tickets().filter(t=>t.code!==code));
  renderPage();
}

// ─── PANEL TABS ───
function switchPanelTab(tab){
  staffPanelTab=tab;
  renderPage();
}

// ─── INIT ───
renderNav();
renderPage();
</script>
</body>
</html>
