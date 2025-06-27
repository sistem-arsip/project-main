<div class="preview-arsip mt-3">
    <?php
    $arsip['ekstensi_file_arsip'] = pathinfo($arsip['file_arsip'], PATHINFO_EXTENSION);
    ?>

    <?php if ($arsip['ekstensi_file_arsip'] == "pdf"): ?>
        <div class="embed-responsive embed-responsive-16by9 mb-3">
            <iframe src="<?php echo base_url("assets/arsip/" . $arsip['file_arsip']) ?>" width="100%" height="500" frameborder="0"></iframe>
        </div>
    <?php endif; ?>

    <?php if (in_array($arsip['ekstensi_file_arsip'], ['png', 'jpg', 'jpeg'])): ?>
        <div class="image-fullscreen" style="width: 100%; overflow: hidden;">
            <img src="<?php echo base_url("assets/arsip/" . $arsip['file_arsip']) ?>"
                alt="Preview Arsip"
                style="width: 100%; height: auto; display: block; margin: 0 auto;">
        </div>
    <?php endif; ?>

    <?php if (in_array($arsip['ekstensi_file_arsip'], ['doc', 'docx'])): ?>
        <div class="embed-responsive embed-responsive-16by9 mb-3">
            <iframe src="https://docs.google.com/gview?url=<?php echo base_url("assets/arsip/" . $arsip['file_arsip']) ?>&embedded=true" width="100%" height="500" frameborder="0"></iframe>
        </div>
    <?php endif; ?>
</div>