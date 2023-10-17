@extends('layouts.main')
@section('title','Pagina Inicial')
@section('content')

@auth
<!-- Cards of the System -->
<div class="container text-center mt-5 mb-5">
        <div class="row">
          <div class="col">
            <a href="" style="text-decoration: none;">
            <div class="card bg-primary">
                <div class="card-content">
                  <div class="card-body">
                    <div class=" row">
                      <div class=" col">
                        <i class="bi bi-people-fill" style="font-size: 60px; color: white;"></i>
                      </div>
                      <div class="text-right col">
                        <h4 class="text-white">{{$juiz}}</h4>
                        <h3 class="text-white">Juizes</h3>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col">
            <a href="" style="text-decoration: none;">
            <div class="card bg-primary">
                <div class="card-content">
                  <div class="card-body">
                    <div class=" row">
                      <div class=" col">
                        <i class="bi bi-journal-check" style="font-size: 60px; color: white;"></i>
                      </div>
                      <div class="text-right col">
                        <h4 class="text-white">{{$processo}}</h4>
                        <h3 class="text-white">Processos</h3>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col">
            <div class="card bg-primary">
                <a href="" style="text-decoration: none;">
                <div class="card-content">
                  <div class="card-body">
                    <div class=" row">
                      <div class=" col">
                        <i class="bi bi-clipboard-check-fill" style="font-size: 60px; color: white;"></i>
                      </div>
                      <div class="text-right col">
                        <h4 class="text-white">{{$sessao}}</h4>
                        <h3 class="text-white">Sessões</h3>
                      </div>
                    </div>
                  </div>
                </div>
                </a>
              </div>
          </div>
        </div>




        <div class="col-12">
              <div class="row">
                    <div class="col mt-3">
                      <a href="" style="text-decoration: none;">
                      <div class="card bg-primary">
                          <div class="card-content">
                            <div class="card-body">
                              <div class=" row">
                                <div class=" col">
                                  <i class="bi bi-file-earmark-check-fill" style="font-size: 60px; color: white;"></i>
                                </div>
                                <div class="text-right col">
                                  <h4 class="text-white">{{$processo_Today}}</h4>
                                  <h3 class="text-white"><br>Processos inseridos hoje</h3>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </a>
                    </div>

                    <div class="col mt-3">
                      <a href="" style="text-decoration: none;">
                      <div class="card bg-primary">
                          <div class="card-content">
                            <div class="card-body">
                              <div class=" row">
                                <div class=" col">
                                  <i class="bi bi-file-earmark-bar-graph-fill" style="font-size: 60px; color: white;"></i>
                                </div>
                                <div class="text-right col">
                                  <h4 class="text-white">{{$processo_Month}}</h4>
                                  <h3 class="text-white">Processos inseridos neste mês</h3>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </a>
                    </div>
                    
                    
                  </div>
                  
            </div>

        <!-- <div class="row mt-1 mb-4">
            <div class="col-8">
                <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
            </div>
        </div> -->
    </div>

   
    <script>
    var juiz = {{ Js::from($juiz) }};
    var sessao = {{ Js::from($sessao) }};

    var xValues = ["Juiz", "Sessao"];
    var yValues = [juiz, sessao];
    var barColors = ["red", "green"];
    new Chart("myChart", {
      type: "bar",
      data: {
        labels: xValues,
        datasets: [{
          backgroundColor: barColors,
          data: yValues
        }]
      },
      options: {
        legend: {display: false},
        title: {
          display: true,
          text: "Dados do Sistema"
        }
      }
    });
</script>



@endauth

@endsection
