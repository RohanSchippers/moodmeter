<style>
    body{
        background: wheat;
    }
    /* Style for mood item */
    .mood-item {
        border: 1px solid #ccc;
        padding: 10px;
        margin-bottom: 10px;
    }

    /* Style for mood name and date */
    .mood-name {
        font-size: 18px;
        font-weight: bold;
        margin: 0;
    }

    .mood-date {
        font-size: 14px;
        color: #666;
        margin: 0;
    }

    /* Style for mood content */
    .mood-content {
        margin-top: 10px;
        font-size: 16px;
    }

    /* Style for view link */
    .view-link {
        display: block;
        margin-top: 10px;
        text-align: right;
    }

    .view-link a {
        color: #009688;
    }

    .view-link a:hover {
        text-decoration: underline;
    }

    /* Style for no mood message */
    .no-mood {
        font-size: 18px;
        color: #666;
        margin-top: 20px;
        text-align: center;
    }

    .no-mood-message {
        font-size: 16px;
        color: #999;
        margin-top: 10px;
        text-align: center;
    }
</style>

<?php if (! empty($moods) && is_array($moods)): ?>
    <?php foreach ($moods as $moods_item): ?>
        <div class="mood-item">
            <!-- <h4 class="mood-name"><?= esc($moods_item['naam']) ?></h4> -->
            <h4 class="mood-date"><?= esc($moods_item['datum']) ?></h4>
            <div class="mood-content"><?= esc($moods_item['mood']) ?></div> <br>
            <div class="mood-opmerking"><?=esc($moods_item['opmerking']) ?></div>
            <div class="view-link">
                <a href="/moods/<?= esc($moods_item['naam'], 'url') ?>">View article</a>
            </div>
        </div>
        
    <?php endforeach ?>
<?php else: ?>
    <div class="no-mood">
        <h3>No Moods</h3>
        <p class="no-mood-message">Unable to find any moods for you.</p>
    </div>
<?php endif ?>
