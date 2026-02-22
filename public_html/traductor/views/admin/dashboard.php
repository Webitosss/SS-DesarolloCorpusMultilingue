<?php 
    require_once __DIR__ . '/../template/header.php';
?>
 
<style>

    main {
        max-width: 1400px;
        margin: 0 auto;
    }

    .admin-title {
        text-align: center;
        margin-bottom: 85px;
    }

    .admin-title h1 {
        font-size: 26px;
        color: #1e3a8a;
        margin-bottom: 5px;
    }

    .admin-title p {
        color: #475569;
        font-size: 14px;
    }

    .admin-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 30px;
    }

    .frases-list {
        display: grid;
        grid-template-rows: repeat(2, 1fr);
        gap: 15px;
        max-height: 380px;
        overflow-y: auto;
        padding-right: 10px;
    }

    .frase-item {
        display: flex;
        justify-content: space-between;
        align-items: center;

        background: #f8fafc;
        border: 1px solid #c7d2fe;
        border-radius: 8px;
        padding: 12px;
        font-size: 14px;
        color: #1e293b;
        gap: 10px;
    }

    .frase-texto {
        flex: 1;
    }

    .delete-form {
        margin: 0;
    }

    .btn-delete, .btn-edit {
        width: auto !important;
        margin-top: 0 !important;
    }

    .btn-edit {
        background: #2563eb;
        color: #fff;
        border: none;
        padding: 6px 10px;
        border-radius: 6px;
        cursor: pointer;
        font-size: 13px;
    }

    .btn-edit:hover {
        background: #1d4ed8;
    }

    .frase-actions {
        display: flex;
        gap: 5px;
        align-items: center;
    }

    /* Modal de edición */
    .modal-overlay {
        display: none;
        position: fixed;
        top: 0; left: 0;
        width: 100%; height: 100%;
        background: rgba(0,0,0,0.5);
        z-index: 1000;
        justify-content: center;
        align-items: center;
    }

    .modal-overlay.active {
        display: flex;
    }

    .modal-box {
        background: #fff;
        border-radius: 12px;
        padding: 30px;
        width: 450px;
        max-width: 90%;
        box-shadow: 0 10px 40px rgba(0,0,0,0.2);
    }

    .modal-box h3 {
        margin-top: 0;
        margin-bottom: 20px;
        color: #2563eb;
        font-size: 18px;
    }

    .modal-actions {
        display: flex;
        gap: 10px;
        margin-top: 20px;
    }

    .modal-actions button {
        margin-top: 0;
        flex: 1;
    }

    .btn-cancel {
        background: #e2e8f0;
        color: #334155;
    }

    .btn-cancel:hover {
        background: #cbd5e1;
    }

    .card {
        background: #ffffff;
        border-radius: 12px;
        padding: 25px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.08);
        border: 1px solid #e5e7eb;
    }

    .card h3 {
        margin-top: 0;
        margin-bottom: 15px;
        color: #2563eb;
        font-size: 18px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        display: block;
        font-size: 14px;
        margin-bottom: 5px;
        color: #334155;
    }

    input {
        width: 100%;
        padding: 10px;
        border-radius: 6px;
        border: 1px solid #cbd5f5;
        font-size: 14px;
    }

    input:focus {
        outline: none;
        border-color: #2563eb;
    }

    button {
        margin-top: 60px;
        width: 100%;
        border: none;
        padding: 12px;
        border-radius: 6px;
        font-size: 14px;
        cursor: pointer;
    }

    button:hover {
        background: #020617;
    }

    .stats {
        font-size: 14px;
        color: #475569;
        margin-bottom: 15px;
    }

    .empty {
        border: 2px dashed #c7d2fe;
        padding: 40px;
        text-align: center;
        color: #64748b;
        border-radius: 10px;
        font-size: 14px;
    }
</style>

<main>

    <div class="admin-title">
        <h1><i class="fa-solid fa-book-open"></i> Registro de vocabulario</h1>
        <p>Agrega y gestiona frases en Español y Mayo-Yoreme</p>
    </div>

    <div class="admin-grid">

        <!-- Card izquierda -->
        <div class="card">
            <h3>Agregar nueva frase</h3>

            <form action="/traductor/index.php?controller=frases&action=registrar" method="POST">
                <div class="form-group">
                    <label>Frase en Español</label>
                    <input type="text" name="frase_espanol" required>
                </div>

                <div class="form-group">
                    <label>Frase en Mayo-Yoreme</label>
                    <input type="text" name="frase_mayo_yoreme" required>
                </div>

                <button type="submit" class="btn btn-success">+ Registrar frase</button>
            </form>

        </div>

        <!-- Card derecha -->
        <div class="card">
            <h3>Vocabulario registrado</h3>

            <div class="stats">
                <?php echo $total; ?> palabras registradas
            </div>

            <?php if (empty($frases)): ?>

                <div class="empty">
                    Aún no hay palabras registradas<br>
                    Comienza agregando tu primera frase
                </div>

            <?php else: ?>

                <div class="frases-list">

            <?php foreach ($frases as $frase): ?>

                <div class="frase-item">

                    <div class="frase-texto">
                        <strong>ES:</strong> <?php echo htmlspecialchars($frase['frase_espanol']); ?><br>
                        <strong>MY:</strong> <?php echo htmlspecialchars($frase['frase_mayo_yoreme']); ?>
                    </div>

                    <div class="frase-actions">

                        <button type="button" class="btn-edit" onclick="abrirModalEditar(<?php echo $frase['id']; ?>, '<?php echo htmlspecialchars(addslashes($frase['frase_espanol']), ENT_QUOTES); ?>', '<?php echo htmlspecialchars(addslashes($frase['frase_mayo_yoreme']), ENT_QUOTES); ?>')">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>

                        <form method="POST" action="/traductor/index.php?controller=frases&action=eliminar" class="delete-form">

                            <input type="hidden" name="id" value="<?php echo $frase['id']; ?>">

                            <button type="submit" class="btn btn-danger btn-sm btn-delete" onclick="return confirm('¿Seguro que deseas eliminar esta frase?')">
                                <i class="fa-solid fa-trash"></i>
                            </button>

                        </form>

                    </div>

                </div>

            <?php endforeach; ?>

            </div>

            <?php endif; ?>

        </div>

    </div>

</main>

<!-- Modal de edición -->
<div class="modal-overlay" id="modalEditar">
    <div class="modal-box">
        <h3><i class="fa-solid fa-pen-to-square"></i> Editar frase</h3>
        <form action="/traductor/index.php?controller=frases&action=editar" method="POST">
            <input type="hidden" name="id" id="edit-id">
            <div class="form-group">
                <label>Frase en Español</label>
                <input type="text" name="frase_espanol" id="edit-espanol" required>
            </div>
            <div class="form-group">
                <label>Frase en Mayo-Yoreme</label>
                <input type="text" name="frase_mayo_yoreme" id="edit-mayo" required>
            </div>
            <div class="modal-actions">
                <button type="button" class="btn-cancel" onclick="cerrarModalEditar()">Cancelar</button>
                <button type="submit" class="btn btn-success">Guardar cambios</button>
            </div>
        </form>
    </div>
</div>

<script>
    function abrirModalEditar(id, espanol, mayo) {
        document.getElementById('edit-id').value = id;
        document.getElementById('edit-espanol').value = espanol;
        document.getElementById('edit-mayo').value = mayo;
        document.getElementById('modalEditar').classList.add('active');
    }

    function cerrarModalEditar() {
        document.getElementById('modalEditar').classList.remove('active');
    }

    // Cerrar modal al hacer clic fuera
    document.getElementById('modalEditar').addEventListener('click', function(e) {
        if (e.target === this) cerrarModalEditar();
    });
</script>

<?php 
    require_once __DIR__ . '/../template/footer.php';
?>
