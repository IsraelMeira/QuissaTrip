var app = {
    initialize: function() {
        this.bindEvents();
    },
    
    bindEvents: function() {
    	document.addEventListener('deviceready', this.onDeviceReady, false);
    },
    
    capturePhoto: function(){
        navigator.camera.getPicture(onSuccess, onFail, { 
            quality: 100,
            destinationType: Camera.DestinationType.DATA_URL,
            saveToPhotoAlbum: true 
        });

        function onSuccess(imageData) {
            alert('Foto Capturada');
        }

        function onFail(message) {
            alert('Failed because: ' + message);
        }

    }
};