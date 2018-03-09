<footer class="m-grid__item m-footer ">
  <div class="m-container m-container--responsive m-container--xxl m-container--full-height m-page__container">
    <div class="m-footer__wrapper">
      <div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
        <div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
          <span class="m-footer__copyright">
            PCUAA Lite v1.0.10 | {{Carbon::now()->year}} &copy; {{Ajuste::where('clave', 'nombre')->first()->$lenguaje}}, {{__('web.desarrollado')}}
            <a href="http://forwarddevs.com" class="m-link">
              ForwardDevs
            </a>
          </span>
        </div>
        <div class="m-stack__item m-stack__item--right m-stack__item--middle m-stack__item--first">
          <ul class="m-footer__nav m-nav m-nav--inline m--pull-right">
            <li class="m-nav__item">
              <a href="#" class="m-nav__link" data-toggle="modal" data-target="#tyc">
                <span class="m-nav__link-text">
                  T&C
                </span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>
