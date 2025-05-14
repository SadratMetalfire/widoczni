<?php include_once 'includes/db.php'; ?>

<h2>Dodaj klienta</h2>

<form action="?page=add_client_action" method="POST">
    <div class="form-group">
        <label for="name">Nazwa <span class="required">*</span></label>
        <input type="text" name="name" id="name" class="form-control">
    </div>
    <div class="form-group">
        <label for="nip">NIP <span class="required">*</span></label>
        <input type="text" name="nip" id="nip" class="form-control">
    </div>
    <div class="form-group">
        <label for="address">Adres</label>
        <textarea name="address" id="address" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="address">Notatki</label>
        <textarea name="address" id="address" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Dodaj klienta</button>
</form>