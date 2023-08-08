const options = {
    coordinates: [40, 40],
    name: "Unicorn Company",
    adress: "123 whatever boulevard",
    postalCode: "000000",
    city: "Bear town",
    website: ["https://www.example.com/", "example.com →"],
    socialMedia: ["https://www.linkedin.com/", "Linkedin →"]
}

var map = L.map('map').setView([-5.5375956, 123.7525173], 12)
L.tileLayer('https://{s}.tile-cyclosm.openstreetmap.fr/cyclosm/{z}/{x}/{y}.png', {
    maxZoom: 20,
    attribution: '<a href="https://github.com/cyclosm/cyclosm-cartocss-style/releases" title="CyclOSM - Open Bicycle render">CyclOSM</a> | Map data: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);


var sample_json = {
    "type": "FeatureCollection",
    "features": [
        {
            "type": "Feature",
            "properties": {
                "image": "https://dynamic-media-cdn.tripadvisor.com/media/photo-o/10/d7/0e/29/fb-img-1469402103442.jpg?w=600&h=400&s=1",
                'title': "Test Title"
            },
            "geometry": {
                "type": "Point",
                "coordinates": [
                    123.6919439,
                    -5.4723687
                ]
            }
        },
        // {
        //     "type": "Feature",
        //     "properties": {},
        //     "geometry": {
        //         "type": "Point",
        //         "coordinates": [
        //             123.693836,
        //             -5.474125
        //         ]
        //     }
        // },
        // {
        //     "type": "Feature",
        //     "properties": {},
        //     "geometry": {
        //         "type": "Point",
        //         "coordinates": [
        //             123.863868,
        //             -5.555902
        //         ]
        //     }
        // },
        // {
        //     "type": "Feature",
        //     "properties": {},
        //     "geometry": {
        //         "type": "Point",
        //         "coordinates": [
        //             123.858493,
        //             -5.558731
        //         ]
        //     }
        // },
        // {
        //     "type": "Feature",
        //     "properties": {},
        //     "geometry": {
        //         "type": "Point",
        //         "coordinates": [
        //             123.781667,
        //             -5.552417
        //         ]
        //     }
        // },
        // {
        //     "type": "Feature",
        //     "properties": {},
        //     "geometry": {
        //         "type": "Point",
        //         "coordinates": [
        //             123.783667,
        //             -5.553861
        //         ]
        //     }
        // },
    ]
}

L.geoJSON(sample_json).on('click', markerOnClick).addTo(map);

function markerOnClick(e) {
    // alert("hi. you clicked the marker at " + e.latlng);
    var title = e.layer.feature.properties.title;
    var image = e.layer.feature.properties.image;

    console.log(e);
    $("#exampleModal").modal('show');
    // set modal
    $("#title").text(title);
    $("#thumbnail").attr("src", image);
}