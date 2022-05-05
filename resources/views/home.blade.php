@extends('layouts.app')

@section('content')
<div>
    <img class = "img" style = "width:100%; display:block" src = "/storage/image/3Ads/1.jpg">
    <img class = "img" style = "width:100%; display:none" src = "/storage/image/3Ads/2.jpg">
    <img class = "img" style = "width:100%; display:none" src = "/storage/image/3Ads/3.jpg">
    <auto-img></auto-img>
    <div class = "container">
        <img class = "img" style = "width:100%;" src = "/storage/image/introduce.jpg">
    </div>
    <div class = "ft">
        <footer class="text-center text-lg-start"  style = "background-color: gray;">
            <div class="container p-4">
                <div class="row">
                <!--Grid column-->
                    <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Footer Content</h5>

                        <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste atque ea quis
                        molestias. Fugiat pariatur maxime quis culpa corporis vitae repudiandae aliquam
                        voluptatem veniam, est atque cumque eum delectus sint!
                        </p>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Links</h5>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#!" class="text-dark">Link 1</a>
                            </li>
                            <li>
                                <a href="#!" class="text-dark">Link 2</a>
                            </li>
                            <li>
                                <a href="#!" class="text-dark">Link 3</a>
                            </li>
                            <li>
                                <a href="#!" class="text-dark">Link 4</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase mb-0">Links</h5>

                        <ul class="list-unstyled">
                            <li>
                                <a href="#!" class="text-dark">Link 1</a>
                            </li>
                            <li>
                                <a href="#!" class="text-dark">Link 2</a>
                            </li>
                            <li>
                                <a href="#!" class="text-dark">Link 3</a>
                            </li>
                            <li>
                                <a href="#!" class="text-dark">Link 4</a>
                            </li>
                        </ul>
                    </div>
                <!--Grid column-->
                </div>
                <!--Grid row-->
            </div>

            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2020 Copyright:
                <a class="text-dark" href="">MDBootstrap.com</a>
            </div>
        </footer>

    </div>
</div>
@endsection
