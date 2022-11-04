<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Edit Event &mdash; Try</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('event') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Edit Event</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Edit Event</h4>
            </div>

            <div class="card-body table-responsive">
                <form action="<?= site_url('event/' . $event->id_event) ?>" method="POST" autocomplete="off">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label>Nama Event</label>
                        <input type="text" name="name_event" value="<?= $event->name_event ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Date Event</label>
                        <input type="date" name="date_event" value="<?= $event->date_event ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Description Event</label>
                        <textarea name="description_event" class="form-control" style="height: 250px;" required><?= $event->description_event ?></textarea>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Submit</button>
                        <button type="reset" class="btn btn-secondary"><i class="fas fa-undo"></i> Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>
<?= $this->endSection() ?>