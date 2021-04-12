<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="Website Testing Sistem Geografis" content="">
    <meta name="Rismawan">
    <title>Cluster Marker</title>
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin=""/>
    
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>
    

     <!-- embedd library jquery -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    
    <!-- library Clustering Map -->
    <script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet-src.js" integrity="sha512-WXoSHqw/t26DszhdMhOXOkI7qCiv5QWXhH9R7CgvgZMHz1ImlkVQ3uNsiQKu5wwbbxtPzFXd1hK4tzno2VqhpA==" crossorigin=""></script> 
    <link rel="stylesheet" href="Leaflet.markercluster-1.4.1/dist/MarkerCluster.css" />
	<link rel="stylesheet" href="Leaflet.markercluster-1.4.1/dist/MarkerCluster.Default.css" />
	<script src="Leaflet.markercluster-1.4.1/dist/leaflet.markercluster-src.js"></script>

    <style>
		.SMP  {
			width: 40px;
			height: 40px;
            position: relative;
			background-color: greenyellow;
			text-align: center;
			font-size: 24px;
		}

        .SMA  {
			width: 40px;
			height: 40px;
            border-radius: 50%;
            position: relative;
			background-color: burlywood;
			text-align: center;
			font-size: 24px;
		}


	</style>


</head>

<body class="fix-header fix-sidebar card-no-border"> 
    <div id="main-wrapper">
        <!-- Informasi Terkait Dengan Long,ltl -->
        <div class="page">
             <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h1 class="text-themecolor m-b-0 m-t-0 center" style="color: burlywood;">Sistem Informasi Geografis Web dan Mobile</h1>
                    </div>
                </div>
                
                <!-- Judul di atas peta -->
                <div class="row">
                    <div class="col-4">
                        <div class="card">
                            <div class="card-block">
                                <div class="jumbotron" style="background-color: burlywood;">
                                    <h2 style="margin-bottom: 0px;" class="card-title">Info Location</h2>
                                    <hr>
                                    <form >
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">Nama Tempat</label>
                                            <input  type="text" placeholder="Nama Tempat"  class="form-control"  disabled >
                                        </div>
                                        <div class="mb-3">
                                            <label for="message-text" class="col-form-label">Kategori</label>
                                            <div class="mb-3">
                                                <select class="form-control form-control-line" n disabled>
                                                    <option value="">--Kategori Tempat--</option>
                                                    <option value="Rumah Makan">Rumah Makan</option>
                                                    <option value="Pom Bensin">Pom Bensin</option>
                                                    <option value="Fasilitas Umum">Fasilitas Umum</option>
                                                    <option value="Pasar/Mall">Pasar/Mall</option>
                                                    <option value="Rumah Sakit">Rumah Sakit</option>
                                                    <option value="Sekolah">Sekolah</option>
                                                    <option value="Universitas">Universitas</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label  for="message-text" class="col-form-label">Keterangan</label>
                                            <textarea name="deskripsi"placeholder="Keterangan"  id="deskripsi" class="form-control" id="message-text" cols="30" rows="5" disabled></textarea>
                                        </div>
                                        <label for="recipient-name" class="col-form-label">Latitude & Longitude</label>
                                        <div class="input-group mb-3">
                                            <input type="text"  class="form-control" placeholder="Latitude" aria-label="Username" disabled>                                                                           >
                                            <input type="text"  class="form-control" placeholder="Longitude" aria-label="Server" disabled>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-info">Save</button>
                                        </div>
                                    </form>
                                </div>                     
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="card">
                            <div class="card-block">
                                <div id="gmaps"  style="height: 700px;"> </div>                             
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color: burlywood;">Add Location</h5>
                <button type="button" data-bs-dismiss="modal" aria-label="Close">
                    <i class="mdi mdi-close"> X</i>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" >
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Nama Tempat</label>
                        <input name="nama" type="text" class="form-control" id="nama" >
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Kategori</label>
                        <div class="mb-3">
                            <select class="form-control form-control-line" name="katagori" id="katagori">
                                <option value="">--Kategori Tempat--</option>
                                <option value="Rumah Makan">Rumah Makan</option>
                                <option value="Pom Bensin">Pom Bensin</option>
                                <option value="Fasilitas Umum">Fasilitas Umum</option>
                                <option value="Pasar/Mall">Pasar/Mall</option>
                                <option value="Rumah Sakit">Rumah Sakit</option>
                                <option value="Sekolah">Sekolah</option>
                                <option value="Universitas">Universitas</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label  for="message-text" class="col-form-label">Keterangan</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control" id="message-text" cols="30" rows="5"></textarea>
                    </div>
                    <label for="recipient-name" class="col-form-label">Latitude & Longitude</label>
                    <div class="input-group mb-3">
                        <input type="text" name="lat" id="lat" class="form-control" placeholder="Username" aria-label="Username" disabled>                                                                           >
                        <input type="text" name="lng" id="lng" class="form-control" placeholder="Server" aria-label="Server" disabled>
                    </div>
                    <div class="modal-footer" style="margin-top:40px;" >
                        <button type="button" class="btn btn-info" data-bs-dismiss="modal">Cancel</button>
                        <button id="btnsave" type="submit" class="btn btn-info">Save</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
        </div>


        <!-- Bagian dari Script code pada peta workspace SIG -->
        <script type="text/javascript">
            
            $(document).ready(function(){
                
                //--------------START Deklarasi awal seperti icon pembuatan map-------------//
                var mymap = L.map('gmaps').setView([-8.6972102,115.222177], 19.97);

                L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                    attribution: 'Adalah API Favoritku',
                    maxZoom: 18,
                    id: 'mapbox/streets-v11',
                    tileSize: 512,
                    zoomOffset: -1,
                    accessToken: 'pk.eyJ1IjoiZGlhaHB1dHJpbSIsImEiOiJja2xrbHRxcHkwb2d6MnBvYnJlemlpZWZpIn0.sWcJMwGJz4ImxXYqa2Iahw'
                }).addTo(mymap);

                mymap.on('mousemove',function(e){
                    document.getElementById("info").innerHTML="Koordinat :("+e.latlng.lat+","+e.latlng.lng+")";
                });
                
                var icMarker = L.icon({
                    iconUrl: 'school.png',
                    iconSize: [36, 40],
                    iconAnchor: [8 , 40],
                    popupAnchor: [12, -28],

                });      

                var markerCluster = L.markerClusterGroup({
                    maxClusterRadius:50,
                    zoomToBoundsOnClick:true,
                    
                    iconCreateFunction: function(cluster) {
                        return L.divIcon({ 
                            iconSize: [30.30],
                            iconAnchor: [15 , 30],
                            html: '<b>' + cluster.getChildCount() + '</b>' 
                        });
                    }
                    
                });
                
                var SMP = L.markerClusterGroup({
                    maxClusterRadius:50,
                    zoomToBoundsOnClick:true,
                    
                    iconCreateFunction: function(cluster) {
                        return L.divIcon({ 
                            iconSize: [30.30],
                            iconAnchor: [15 , 30],
                            className: 'SMP',
                            html: '<b>' + cluster.getChildCount() + '</b>' 
                        });
                    }
                    
                })

                var SMA = L.markerClusterGroup({
                    maxClusterRadius:50,
                    zoomToBoundsOnClick:true,
                    
                    iconCreateFunction: function(cluster) {
                        return L.divIcon({ 
                            iconSize: [30.30],
                            iconAnchor: [15 , 30],
                            className: 'SMA',
                            html: '<b>' + cluster.getChildCount() + '</b>' 
                        });
                    }
                    
                });

                mymap.addLayer(SMA);
                mymap.addLayer(SMP);
                mymap.addLayer(markerCluster);
                //--------------END Deklarasi awal seperti icon pembuatan map-------------//


                
               //--------------START Action Pada Map Website-------------//

                // show modal in action form add marker //
                mymap.on('click', function(e){
                    $('#lat').val(e.latlng.lat);
                    $('#lng').val(e.latlng.lng);
                    $('#exampleModal').modal('show');
                });

                // fungsi dari add marker dimana langusng aja di sini markernya add //
                function createMarker(latLng,id,type){
                    var marker = L.marker(latLng,{
                                    icon : icMarker,
                                    id : id
                                }).bindPopup();

                                marker.on('click',function(e){
                                    marker.setPopupContent(type.toString());
                                });
                    switch(type){
                        case "SMP":
                            SMP.addLayer(marker);
                            break;
                        case "SMA":
                            SMA.addLayer(marker);
                            break;
                        default:
                            SMA.addLayer(marker);
                            break;
                    }
                }


                // fungsi load data dari php server dengan melakkan perulangan //
                $.ajax({
                    url : "./loadData.php",
                    type : "get",
                    dataType : "json",
                    success: function(response){
                        var len = response.length;
                        for(var i=0; i<len; i++){
                            createMarker([response[i].lat,response[i].lng],response[i].id,response[i].type)
                        }
                    }

                });
                
                //ketika btnsave di teken maka dia akan nyimpen ke database
                $("#btnsave").click(function(){
                    var nama = $('#nama').val();
                    var katagori = $('#katagori').val();
                    var deskripsi = $('#deskripsi').val();
                    var lat = $('#lat').val();
                    var lng = $('#lng').val();
                        
                    $.ajax({
                        url: "simpanData.php",
                        type : "POST",
                        data : {
                            nama : nama,
                            katagori : katagori,
                            deskripsi : deskripsi,
                            lat : lat,
                            lng : lng
                        },
                        success :function(response){
                            alert(response);
                        }
                    });
                });
                
            });

        </script>    
    </div>

    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <script src="assets/plugins/bootstrap/js/tether.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/waves.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyCUBL-6KdclGJ2a_UpmB2LXvq7VOcPT7K4&sensor=true"></script>
    <script src="assets/plugins/gmaps/gmaps.min.js"></script>
    <script src="assets/plugins/gmaps/jquery.gmaps.js"></script>
</body>

</html>