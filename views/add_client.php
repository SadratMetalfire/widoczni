<?php include_once 'includes/db.php'; ?>

<h2 class="mb-4">Dodaj klienta</h2>

<form action="?page=add_client_action" method="POST">
    <div class="mb-3 form-group">
        <label for="name" class="form-label">Nazwa <span class="text-danger required">*</span></label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <div class="mb-3  form-group">
        <label for="nip" class="form-label">NIP <span class="text-danger required">*</span></label>
        <input type="text" name="nip" id="nip" class="form-control" required>
    </div>
    <div class="mb-3 form-group">
        <label for="address" class="form-label">Adres</label>
        <textarea name="address" id="address" class="form-control" rows="3"></textarea>
    </div>
    <div class="mb-3 form-group">
        <label for="address" class="form-label">Notatki</label>
        <textarea name="address" id="address" class="form-control" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Dodaj klienta</button>
</form>