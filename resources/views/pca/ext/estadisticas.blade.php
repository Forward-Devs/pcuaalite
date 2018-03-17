
@php
  $crecimiento = App\Helpers\Funciones::getPercent($modelo);
@endphp
  <div class="m-widget24">
  <div class="m-widget24__item">
    <h4 class="m-widget24__title">
      {{$nombre}}
    </h4>
    <br>
    <span class="m-widget24__desc">
      Total
    </span>
    <span class="m-widget24__stats m--font-{{$color}}">
      {{$cantidad}}
    </span>
    <div class="m--space-10"></div>
    @if ($crecimiento > 0)
      <div class="progress m-progress--sm">
        <div class="progress-bar m--bg-{{$color}}" role="progressbar" style="width: {{$crecimiento}}%;" aria-valuenow="{{$crecimiento}}" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
      <span class="m-widget24__change">
        Esta semana
      </span>
      <span class="m-widget24__number">
        <b>+{{$crecimiento}}%</b>
      </span>
      @else
        <div class="progress m-progress--sm">
          <div class="progress-bar m--bg-{{$color}}" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <span class="m-widget24__change">
          Esta semana
        </span>
        <span class="m-widget24__number m--font-danger">
          <b>{{$crecimiento}}%</b>
        </span>
    @endif

  </div>
</div>
