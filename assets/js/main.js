const alert = bootstrap.Alert.getOrCreateInstance('.alert');

setTimeout(() => {
    alert.close();
}, 5000);
