// Import and configure the Firebase SDK
// These scripts are made available when the app is served or deployed on Firebase Hosting
// If you do not serve/host your project using Firebase Hosting see https://firebase.google.com/docs/web/setup
importScripts('https://www.gstatic.com/firebasejs/4.8.1/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/4.8.1/firebase-messaging.js');

var firebaseConfig = {
        apiKey: "AIzaSyBShG9W1Yf1ssg7kuuQBKm2VYH2oyCAe5A",
        authDomain: "covid19cascavel.firebaseapp.com",
        databaseURL: "https://covid19cascavel.firebaseio.com",
        projectId: "covid19cascavel",
        storageBucket: "covid19cascavel.appspot.com",
        messagingSenderId: "884857282315",
        appId: "1:884857282315:web:a87fa86dd3cd4116264c0e"
};

var project = firebase.initializeApp(firebaseConfig);
var messaging = project.messaging();


// If you would like to customize notifications that are received in the
// background (Web app is closed or not in browser focus) then you should
// implement this optional method.
// [START background_handler]
messaging.setBackgroundMessageHandler(function(payload) {
    console.log('[firebase-messaging-sw.js] Received background message ', payload);
    // Customize notification here
    const notificationTitle = 'Background Message Title';
    const notificationOptions = {
        body: 'Background Message body.',
        icon: '/firebase-logo.png'
    };

    return self.registration.showNotification(notificationTitle, notificationOptions);
});
