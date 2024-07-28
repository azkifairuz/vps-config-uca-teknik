@include('layout/header')


<div class="hero-image" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://img.freepik.com/free-vector/flat-farm-landscape-background_23-2148170385.jpg?semt=ais_hybrid')">
  <div class="hero-text">
    <h1 class="mb-5">Sistem Pakar Diagnosa Penyakit Sapi</h1>
    <a href="{{route('mulaiTes')}}" class="btn btn-primary">mulai tes</a>
  </div>
</div>
<style>
  body, html {
    height: 100%;
}

/* The hero image */
.hero-image {
  /* Use "linear-gradient" to add a darken background effect to the image (photographer.jpg). This will make the text easier to read */
  

  /* Set a specific height */
  height: 100%;

  /* Position and center the image to scale nicely on all screens */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}

/* Place text in the middle of the image */
.hero-text {
  text-align: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: white;
}
</style>

@include('layout/footer')