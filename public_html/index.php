<?php
// Contador de visitas basado en archivo de texto
$counterFile = __DIR__ . '/contador_visitas.txt';
$visitCount = 0;

if (!file_exists($counterFile)) {
    // Crea el archivo con valor inicial 0
    file_put_contents($counterFile, "0");
}

$fp = fopen($counterFile, 'c+');
if ($fp) {
    if (flock($fp, LOCK_EX)) {
        $contents = stream_get_contents($fp);
        $visitCount = is_numeric(trim($contents)) ? (int)$contents : 0;
        $visitCount++;
        ftruncate($fp, 0);
        rewind($fp);
        fwrite($fp, (string)$visitCount);
        fflush($fp);
        flock($fp, LOCK_UN);
    }
    fclose($fp);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Traductor Mayo-Yoreme a Español</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  
  <!-- Tipografías -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Crimson+Text:wght@400;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  
  <style>
    :root {
      --color-azul-profundo: #0D1B3D;
      --color-azul: #1565C0;
      --color-amarillo: #FFC107;
      --color-naranja: #F57C00;
      --color-verde: #2E7D32;
      --color-fondo: #FFF9F0;
      --color-texto: #212121;
      --color-card-borde: #E0E0E0;
      --radius-card: 16px;
      --shadow-suave: 0 8px 20px rgba(0, 0, 0, 0.06);
    }

    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: "Inter", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
      background-color: var(--color-fondo);
      color: var(--color-texto);
    }

    p, li {
      text-align: justify;
    }

    .page-wrapper {
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    header {
      background: linear-gradient(120deg, var(--color-azul-profundo), var(--color-azul), var(--color-amarillo), var(--color-naranja));
      color: #ffffff;
      padding: 1.5rem 1rem;
    }

    .header-content {
      max-width: 1100px;
      margin: 0 auto;
      display: flex;
      align-items: center;
      gap: 1.5rem;
      flex-wrap: wrap;
    }

    .logos {
      display: flex;
      align-items: center;
      gap: 1rem;
      flex-shrink: 0;
      flex-wrap: wrap;
    }

    .logos img {
      height: 70px;
      width: auto;
      object-fit: contain;
    }

    .logos img.app-logo {
      height: 60px; /* un poco más pequeño para armonizar */
    }

    .header-text {
      flex: 1;
      min-width: 260px;
    }

    .header-text h1 {
      margin: 0 0 0.25rem;
      font-family: "Crimson Text", "Times New Roman", serif;
      font-weight: 700;
      font-size: clamp(1.6rem, 3vw, 2.1rem);
      line-height: 1.2;
      text-align: justify;
    }

    .header-text p {
      margin: 0;
      font-size: 0.95rem;
      opacity: 0.95;
    }

    .tag {
      display: inline-flex;
      align-items: center;
      gap: 0.4rem;
      padding: 0.2rem 0.8rem;
      border-radius: 999px;
      font-size: 0.75rem;
      text-transform: uppercase;
      letter-spacing: 0.06em;
      background-color: rgba(0, 0, 0, 0.15);
      color: #fff;
      border: 1px solid rgba(255, 255, 255, 0.4);
      margin-bottom: 0.4rem;
    }

    .tag span.icon-dot {
      width: 7px;
      height: 7px;
      border-radius: 50%;
      background-color: #ffffff;
    }

    main {
      flex: 1;
      padding: 2rem 1rem 2.5rem;
    }

    .container {
      max-width: 1100px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: minmax(0, 2.2fr) minmax(0, 1.5fr);
      gap: 2rem;
    }

    @media (max-width: 800px) {
      .container {
        grid-template-columns: minmax(0, 1fr);
      }
    }

    .card {
      background-color: #ffffff;
      border-radius: var(--radius-card);
      box-shadow: var(--shadow-suave);
      padding: 1.75rem 1.5rem;
      border: 1px solid var(--color-card-borde);
    }

    .card + .card {
      margin-top: 1.25rem;
    }

    .card-title {
      font-family: "Crimson Text", "Times New Roman", serif;
      font-weight: 700;
      color: var(--color-naranja);
      margin: 0.3rem 0 0.6rem;
      font-size: 1.5rem;
      text-align: justify;
    }

    .card-subtitle {
      font-size: 0.95rem;
      color: #555555;
      margin: 0 0 1rem;
    }

    .intro-preservacion {
      background: linear-gradient(120deg, rgba(255, 193, 7, 0.1), rgba(21, 101, 192, 0.05));
      border-left: 4px solid var(--color-amarillo);
      padding: 0.9rem 1rem;
      border-radius: 12px;
      font-size: 0.95rem;
      margin-bottom: 1.1rem;
    }

    .intro-preservacion strong {
      color: var(--color-azul-profundo);
    }

    .section-title {
      font-family: "Crimson Text", "Times New Roman", serif;
      font-weight: 700;
      font-size: 1.2rem;
      margin: 0 0 0.8rem;
      color: var(--color-verde);
      text-align: justify;
    }

    .students-list {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .students-list li {
      padding: 0.4rem 0;
      border-bottom: 1px solid #eeeeee;
      font-size: 0.95rem;
    }

    .students-list li:last-child {
      border-bottom: none;
    }

    .students-list span.programa {
      font-weight: 600;
      color: var(--color-naranja);
    }

    .cta-section {
      margin-top: 1.5rem;
      padding-top: 1.25rem;
      border-top: 1px dashed #e0e0e0;
    }

    .cta-section p {
      margin: 0 0 0.9rem;
      font-size: 0.95rem;
      color: #555555;
    }

    .cta-button {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
      padding: 0.9rem 1.7rem;
      border-radius: 999px;
      border: none;
      cursor: pointer;
      background-image: linear-gradient(135deg, var(--color-amarillo), var(--color-naranja));
      color: #ffffff;
      font-weight: 600;
      font-size: 0.98rem;
      text-decoration: none;
      box-shadow: 0 10px 24px rgba(245, 124, 0, 0.3);
      transition: transform 0.12s ease, box-shadow 0.12s ease, filter 0.12s ease;
    }

    .cta-button span.icon-arrow {
      font-size: 1.1rem;
      line-height: 1;
    }

    .cta-button:hover {
      transform: translateY(-1px);
      box-shadow: 0 14px 28px rgba(245, 124, 0, 0.32);
      filter: brightness(1.04);
    }

    .cta-button:active {
      transform: translateY(0);
      box-shadow: 0 6px 16px rgba(245, 124, 0, 0.25);
    }

    .contact-card {
      background-color: #ffffff;
      border-radius: var(--radius-card);
      box-shadow: var(--shadow-suave);
      padding: 1.5rem 1.4rem;
      border: 1px solid var(--color-card-borde);
      border-top: 4px solid var(--color-azul);
    }

    .contact-header {
      display: flex;
      align-items: center;
      gap: 0.6rem;
      margin-bottom: 0.75rem;
    }

    .contact-icon {
      width: 32px;
      height: 32px;
      border-radius: 10px;
      background: linear-gradient(135deg, var(--color-azul), var(--color-amarillo));
      display: flex;
      align-items: center;
      justify-content: center;
      color: #ffffff;
      font-size: 1.1rem;
      flex-shrink: 0;
    }

    .contact-title {
      margin: 0;
      font-weight: 600;
      font-size: 1rem;
      text-align: justify;
    }

    .contact-body {
      font-size: 0.93rem;
    }

    .contact-body p {
      margin: 0 0 0.5rem;
    }

    .contact-body a {
      color: var(--color-azul);
      text-decoration: none;
      font-weight: 500;
    }

    .contact-body a:hover {
      text-decoration: underline;
    }

    footer {
      margin-top: auto;
      background-color: var(--color-azul-profundo);
      color: #f5f5f5;
      padding: 1.5rem 1rem 1.25rem;
      font-size: 0.85rem;
    }

    .footer-content {
      max-width: 1100px;
      margin: 0 auto;
      display: flex;
      flex-direction: column;
      gap: 0.6rem;
    }

    .footer-address {
      opacity: 0.9;
    }

    .footer-meta {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      gap: 0.5rem;
      opacity: 0.85;
    }

    .visit-counter {
      font-size: 0.85rem;
      margin-top: 0.25rem;
    }
  </style>
</head>
<body>
  <div class="page-wrapper">
    <header>
      <div class="header-content">
        <div class="logos">
          <img src="img/uas_logo.png" alt="Logo Universidad Autónoma de Sinaloa" />
          <img src="img/fi_mazatlan_logo.png" alt="Logo Facultad de Informática Mazatlán" />
          <!-- Logo de la aplicación como imagen PNG -->
          <img src="img/logo.png" alt="Logo Traductor Mayo-Yoreme a Español" class="app-logo" />
        </div>
        <div class="header-text">
          <div class="tag">
            <span class="icon-dot"></span>
            <span>Unidad Regional Sur · Facultad de Informática Mazatlán</span>
          </div>
          <h1>Traductor Mayo-Yoreme a Español</h1>
          <p>Proyecto de Servicio Social. Universidad Autónoma de Sinaloa.</p>
        </div>
      </div>
    </header>

    <main>
      <div class="container">
        <!-- Columna izquierda -->
        <section>
          <article class="card">
            <h2 class="card-title">Proyecto de Servicio Social</h2>

            <p class="intro-preservacion">
              La lengua Mayo-Yoreme forma parte del patrimonio cultural y lingüístico de México. 
              <strong>Preservarla, documentarla y hacerla accesible a las nuevas generaciones es una prioridad</strong> 
              que se alinea con las políticas nacionales de fortalecimiento de las lenguas indígenas y de 
              reconocimiento de los pueblos originarios. Este traductor Mayo-Yoreme a Español contribuye a dicha 
              prioridad al ofrecer una herramienta tecnológica para el aprendizaje, la comunicación y la investigación.
            </p>

            <p class="card-subtitle">
              Esta plataforma web apoya la preservación lingüística y el acceso a la lengua Mayo-Yoreme mediante 
              un traductor hacia el español, integrando tecnologías educativas y recursos digitales para docentes, 
              estudiantes y comunidad en general.
            </p>

            <div class="cta-section">
              <p>
                Puedes acceder a la aplicación web del traductor desde el siguiente botón. 
                Se recomienda utilizar un navegador web actualizado para una mejor experiencia de uso.
              </p>
              <a class="cta-button" href="https://mayo-yoreme.uas.edu.mx/traductor/views/auth/login.php">
                <span>Ingresar al Traductor</span> 
                <span class="icon-arrow">↗</span>
              </a>
            </div>
          </article>

          <article class="card" style="margin-top: 1.5rem;">
            <h2 class="section-title">Alumnos Participantes</h2>
            <ul class="students-list">
              <li>
                Daniel Hiram Osuna
                &mdash; <span class="programa">Licenciatura en Ingeniería en Sistemas de Información</span>
              </li>
              <li>
                Alexis Javier Devora Molina
                &mdash; <span class="programa">Licenciatura en Informática</span>
              </li>
              <li>
                Emmanuel Antonio Aguilar Osuna
                &mdash; <span class="programa">Licenciatura en Informática</span>
              </li>
              <li>
                Bryan Orlando Gallardo Valadez
                &mdash; <span class="programa">Licenciatura en Informática</span>
              </li>
              <li>
                Emiliano López Camacho
                &mdash; <span class="programa">Licenciatura en Informática</span>
              </li>
            </ul>
          </article>
        </section>

        <!-- Columna derecha -->
        <aside class="contact-card">
          <div class="contact-header">
            <div class="contact-icon">✉</div>
            <h3 class="contact-title">Información de contacto</h3>
          </div>
          <div class="contact-body">
            <p>
              Para dudas académicas, colaboración o más información sobre el proyecto de traductor Mayo-Yoreme a Español:
            </p>
            <p>
              <strong>Dr. José Alfonso Aguilar Calderón</strong><br>
              Cuerpo Académico Tecnología Educativa I+D+i (UAS-CA-303)<br>
              Facultad de Informática Mazatlán<br>
              Universidad Autónoma de Sinaloa.
            </p>
            <p>
              <strong>Contacto:</strong><br>
              <a href="https://info.maz.uasnet.mx/jaguilar" target="_blank" rel="noopener noreferrer">
                https://info.maz.uasnet.mx/jaguilar
              </a><br>
              <a href="mailto:ja.aguilar@uas.edu.mx">ja.aguilar@uas.edu.mx</a><br>
              +52 669 981 1560 Ext. 209
            </p>
            <p>
              <strong>Colaboradores de Proyecto:</strong><br>
              Dra. Carolina Tripp Barba &mdash; Universidad Autónoma de Sinaloa<br>
              Dr. Aníbal Zaldívar Colado &mdash; Universidad Autónoma de Sinaloa<br>
              Dr. Pablo Alfonso Aguilar Calderón &mdash; Universidad Autónoma de Sinaloa<br>
              Dr. Pedro Alfonso Aguilar Calderón &mdash; Universidad Autónoma de Sinaloa<br>
              Dr. Emilio Sánchez García &mdash; Universidad Autónoma Indígena de México<br>
              Dr. Iván Alvarez &mdash; Universidad Autónoma Indígena de México
            </p>
          </div>
        </aside>
      </div>
    </main>

    <footer>
      <div class="footer-content">
        <div class="footer-address">
          <strong>Universidad Autónoma de Sinaloa · Unidad Regional Sur</strong><br />
          Av. De los Deportes y Av. Leonismo Internacional S/N,<br />
          Col. Antiguo Aeropuerto, C.P. 82146, Mazatlán, Sinaloa, México.
        </div>
        <div class="footer-meta">
          <span>© Universidad Autónoma de Sinaloa. Todos los derechos reservados.</span>
          <span>Traductor Mayo-Yoreme a Español · Proyecto de servicio social</span>
        </div>
        <div class="visit-counter">
          Visitas a esta página: <strong><?php echo $visitCount; ?></strong>
        </div>
      </div>
    </footer>
  </div>
</body>
</html>
