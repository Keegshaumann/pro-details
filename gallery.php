<?php
$page_title = 'Work';
include 'includes/header.php';

$items = [
    ['cat' => 'correction', 'title' => 'Porsche 911',     'sub' => 'Two-stage correction',   'img' => 'photo-1503376780353-7e6692767b70', 'span' => 'g-1'],
    ['cat' => 'coating',    'title' => 'Audi R8',         'sub' => '5yr ceramic coating',    'img' => 'photo-1583121274602-3e2820c69888', 'span' => 'g-3'],
    ['cat' => 'detail',     'title' => 'Mustang GT',      'sub' => 'Premium full detail',    'img' => 'photo-1494976388531-d1058494cdd8', 'span' => 'g-4'],
    ['cat' => 'ppf',        'title' => 'McLaren 720S',    'sub' => 'PPF + ceramic combo',    'img' => 'photo-1544636331-e26879cd4d9b', 'span' => 'g-5'],
    ['cat' => 'interior',   'title' => 'Range Rover',     'sub' => 'Interior reset',         'img' => 'photo-1606664515524-ed2f786a0bd6', 'span' => 'g-6'],
    ['cat' => 'detail',     'title' => 'BMW M3',          'sub' => 'Wheels-off detail',      'img' => 'photo-1525609004556-c46c7d6cf023', 'span' => 'g-7'],
    ['cat' => 'correction', 'title' => 'Mercedes C-Class','sub' => 'Single-stage polish',    'img' => 'photo-1542362567-b07e54358753', 'span' => 'g-2'],
    ['cat' => 'coating',    'title' => 'BMW G80 M3',      'sub' => '9yr ceramic system',     'img' => 'photo-1555215695-3004980ad54e', 'span' => 'g-5'],
    ['cat' => 'detail',     'title' => 'Volkswagen Golf', 'sub' => 'Premium package',        'img' => 'photo-1605559424843-9e4c228bf1c2', 'span' => 'g-6'],
    ['cat' => 'interior',   'title' => 'Mercedes GLE',    'sub' => 'Leather restoration',    'img' => 'photo-1606664515524-ed2f786a0bd6', 'span' => 'g-7'],
    ['cat' => 'ppf',        'title' => 'Aston Martin',    'sub' => 'Front-end PPF',          'img' => 'photo-1492144534655-ae79c964c9d7', 'span' => 'g-8'],
    ['cat' => 'correction', 'title' => 'Audi RS6',        'sub' => 'Three-stage correction', 'img' => 'photo-1607860108855-64acf2078ed9', 'span' => 'g-9'],
];
?>

<!-- PAGE HERO -->
<section class="page-hero">
    <div class="container">
        <div class="page-hero-grid">
            <div class="reveal">
                <div class="crumbs">
                    <a href="index.php">Studio</a>
                    <span class="sep">/</span>
                    <span>Work</span>
                </div>
                <span class="eyebrow cognac">— Selected · 03</span>
                <h1 class="display-1" style="margin-top:0.6rem;">Recent<br><em>work.</em></h1>
                <p class="lede" style="margin-top:1.5rem;">A rolling archive of cars that have come through the bay. Filter by service to narrow it down.</p>
            </div>
            <div class="page-hero-image reveal reveal-d2" style="background-image:url('https://images.unsplash.com/photo-1555215695-3004980ad54e?auto=format&fit=crop&w=1200&q=80');"></div>
        </div>
    </div>
</section>

<!-- GALLERY -->
<section class="gallery-strip">
    <div class="container">
        <div class="gal-filters reveal" id="galFilters">
            <button class="gal-filter is-active" data-filter="all">All Work</button>
            <button class="gal-filter" data-filter="correction">Paint Correction</button>
            <button class="gal-filter" data-filter="coating">Ceramic Coating</button>
            <button class="gal-filter" data-filter="ppf">PPF</button>
            <button class="gal-filter" data-filter="interior">Interior</button>
            <button class="gal-filter" data-filter="detail">Full Detail</button>
        </div>

        <div class="gallery-grid" id="galleryGrid">
            <?php foreach ($items as $item): ?>
            <div class="gallery-item <?php echo $item['span']; ?> reveal" data-cat="<?php echo $item['cat']; ?>" style="background-image:url('https://images.unsplash.com/<?php echo $item['img']; ?>?auto=format&fit=crop&w=1200&q=80');">
                <span class="gallery-caption"><?php echo $item['title']; ?> · <?php echo $item['sub']; ?></span>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
