@extends('layouts.visual')
@section('content')
    
    <div id="hero-area" class="hero-area-bg">
        <div class="container">      
           <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="hero-area text-center">
                        <h1 class="wow fadeInUp" data-wow-delay="0.3s">Data Mahasiswa Aktif</h1>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                          </tr>
                        </tbody>
                    </table>
                </div>

            </div>
            
        </div> 
    </div>

    http://127.0.0.1:8000/api/visualisasi/mhsAktif/A2:C7
    http://127.0.0.1:8000/api/visualisasi/mhsAktif/E2:F7
@endsection