$(document).ready(function() {
    fetchProducts();
});

function fetchProducts() {
    $.ajax({
        url: 'fetch_products.php',
        type: 'GET',
        dataType: 'json',
        success: function(products) {
            createSlider(products);
        },
        error: function(xhr, status, error) {
            console.error('Error fetching products:', error);
        }
    });
}

function createSlider(products) {
    let sliderContainer = $('.slider');

    // Create slider elements dynamically
    $.each(products, function(index, product) {
        let slide = $('<div>').addClass('slide');
        let img = $('<img>').attr({
            src: product.imageUrl,
            alt: product.name
        });
        slide.append(img);
        sliderContainer.append(slide);
    });

    // Initialize Slick slider
    sliderContainer.slick({
        autoplay: true,
        autoplaySpeed: 3000,
        arrows: true,
        dots: true,
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear'
    });
}