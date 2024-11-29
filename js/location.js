document.addEventListener("DOMContentLoaded", function () {
    const locationElement = document.getElementById("user-location");

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            function (position) {
                const latitude = position.coords.latitude;
                const longitude = position.coords.longitude;

                // Fetch full address using OpenStreetMap's Nominatim API
                fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${latitude}&lon=${longitude}&addressdetails=1`)
                    .then(response => response.json())
                    .then(data => {
                        const address = data.address;
                        const street = address.road || address.suburb || "";
                        const city = address.city || address.town || address.village || "";
                        const state = address.state || "";
                        const country = address.country || "";
                        const zipcode = address.postcode || address.zip || "";
                        
                        // Format the full address
                        let fullAddress = `${street ? street + ", " : ""}${city ? city + ", " : ""}${state ? state + ", " : ""}${zipcode ? zipcode + ", " : ""}${country}`;
                        
                        locationElement.textContent = fullAddress || "Unable to determine full address";
                    })
                    .catch(() => {
                        locationElement.textContent = "Unable to fetch location";
                    });
            },
            function () {
                locationElement.textContent = "Location access denied";
            }
        );
    } else {
        locationElement.textContent = "Geolocation not supported";
    }
});
