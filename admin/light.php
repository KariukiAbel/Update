<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="utf-8">
    <title>Lightbox Example</title>
    <link rel="stylesheet" href="dist/css/lightbox.css">
</head>
<body>

<section>
      <h3>A Four Image Set</h3>
    <div>
        <a class="example-image-link" href="images/120px_rainforest_bluemountainsnsw.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image" src="images/120px_rainforest_bluemountainsnsw.jpg" width="200" height="100" alt=""/></a>
        <a class="example-image-link" href="images/180px_koala_ag1.jpg" data-lightbox="example-set" data-title="Or press the right arrow on your keyboard."><img class="example-image" src="images/180px_koala_ag1.jpg" width="200" height="100" alt="" /></a>
        <a class="example-image-link" href="images/180px_ormiston_pound.jpg" data-lightbox="example-set" data-title="The next image in the set is preloaded as you're viewing."><img class="example-image" src="images/180px_ormiston_pound.jpg" width="200" height="100"alt="" /></a>
        <a class="example-image-link" href="images/180px_wobbegong.jpg" data-lightbox="example-set" data-title="Click anywhere outside the image or the X to the right to close."><img class="example-image" src="images/180px_wobbegong.jpg" width="200" height="100" alt="" /></a>
    </div>
</section>
<script>
    lightbox.option({
        'resizeDuration': 200,
        'wrapAround': true
    })
</script>

<script src="dist/js/lightbox-plus-jquery.js"></script>
<script src="dist/js/lightbox.js"></script>

</body>
</html>
