let currentIndex = 0;
let intervalId;

function showSlide(index) {
    const carouselInner = document.querySelector('.carousel-inner');
    const totalSlides = document.querySelectorAll('.carousel-item').length;

    if (index >= totalSlides) {
        currentIndex = 0;
    } else if (index < 0) {
        currentIndex = totalSlides - 1;
    } else {
        currentIndex = index;
    }

    const translateValue = -currentIndex * 100 + '%';
    carouselInner.style.transform = 'translateX(' + translateValue + ')';
}

function nextSlide() {
    showSlide(currentIndex + 1);
}

function prevSlide() {
    showSlide(currentIndex - 1);
}

function startCarousel() {
    intervalId = setInterval(nextSlide, 5000); // Change slide every 5 seconds
}

function stopCarousel() {
    clearInterval(intervalId);
}

// Trigger the start of the carousel when the DOM is loaded
document.addEventListener('DOMContentLoaded', function () {
    startCarousel();
});

// Pause the carousel when the sidebar is toggled
function toggleSidebar() {
    var sidebar = document.getElementById('sidebar');
    var content = document.getElementById('content');
    var header = document.querySelector('header');
    sidebar.classList.toggle('show');
    content.classList.toggle('content-shifted', sidebar.classList.contains('show'));
    header.style.marginLeft = (sidebar.classList.contains('show')) ? '250px' : '0';

    // Pause or resume the carousel when the sidebar is toggled
    if (sidebar.classList.contains('show')) {
        stopCarousel();
    } else {
        startCarousel();
    }
}

// Google Sign-In function (if you're using it)
const googleSignInButton = document.getElementById('googleSignInButton');

googleSignInButton.addEventListener('click', async () => {
    try {
        const provider = new firebase.auth.GoogleAuthProvider();
        await firebase.auth().signInWithPopup(provider);
        console.log('User logged in with Google successfully');
    } catch (error) {
        console.error('Google Sign-In error:', error.message);
        alert(error.message);
    }
});





//Products detail page

function requestQuote() {
    var quantity = document.getElementById("quantity").value;
    // Logic to request a quote with the specified quantity
    alert("Requesting a quote for " + quantity + " units. We'll contact you shortly.");
}

function shareOnFacebook() {
    // Logic to share on Facebook
    alert("Sharing on Facebook...");
}

function shareOnTwitter() {
    // Logic to share on Twitter
    alert("Sharing on Twitter...");
}

function copyURL() {
    // Logic to copy the URL
    alert("URL copied to clipboard.");
}



//Add To Cart//
function addToCart() {
    // Check if user is logged in
    if (!firebase.auth().currentUser) {
        // Redirect to login page if not logged in
        window.location.href = 'login.html';
    } else {
        // Add item to cart if logged in
        addToUserCart();
    }
}

function addToUserCart() {
    // Implement code to add item to user's cart in your database
    // You may need to fetch user ID and other details to associate the item with the correct user
    // Example:
    const userId = firebase.auth().currentUser.uid;
    const itemId = 'your_item_id_here';

    // Add item to user's cart in Firebase Database or Firestore
    firebase.database().ref('carts/' + userId).push({
        itemId: itemId,
        quantity: 1 // Example quantity
    }).then(() => {
        console.log('Item added to cart successfully');
    }).catch(error => {
        console.error('Error adding item to cart:', error);
    });
}
