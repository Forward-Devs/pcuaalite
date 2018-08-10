<template>
  <div class="m-portlet m-portlet--bordered-semi m-portlet--full-height">
    <div class="m-portlet__head m-portlet__head--fit">
      <div class="m-portlet__head-caption">
        <div class="m-portlet__head-action">
          <button type="button" class="btn btn-sm m-btn--pill  btn-brand" v-text="noticiatxt">
          </button>
        </div>
      </div>
    </div>
    <div class="m-portlet__body">
      <div class="m-widget19">
        <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style1="height: 280px">
          <img v-bind:src="noticiaimg" alt="">
          <h3 class="m-widget19__title m--font-light" v-text="noticiatitle">
          </h3>
          <div class="m-widget19__shadow"></div>
        </div>
        <div class="m-widget19__content">
          <div class="m-widget19__header">
            <div class="m-widget19__user-img">
              <img class="m-widget19__img" v-bind:src="user.avatar" alt="">
            </div>
            <div class="m-widget19__info">
              <span class="m-widget19__username" v-text="user.name">
              </span>
              <br>
              <span class="m-widget19__time" v-text="time">
              </span>
            </div>
            <div class="m-widget19__stats">
              <span class="m-widget19__number m--font-brand">
                0
              </span>
              <span class="m-widget19__comment" v-text="comments">
              </span>
            </div>
          </div>
          <div v-if="!full" class="m-widget19__body" v-text="noticiabody"></div>
          <div v-if="full" class="m-widget19__body" v-html="noticiabodyfull"></div>
        </div>
        <div class="m-widget19__action" v-if="!full">
          <button class="btn m-btn--pill btn-secondary m-btn m-btn--hover-brand m-btn--custom" v-on:click="full=true" v-text="more">
          </button>
        </div>
        <div class="m-widget19__action" v-if="full">
          <button class="btn m-btn--pill btn-secondary m-btn m-btn--hover-brand m-btn--custom" v-on:click="full=false" v-text="less">
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
    export default {
        props: ['less','noticiatxt', 'noticiatitle', 'noticiaimg', 'lang', 'usern', 'time', 'comments', 'more', 'noticiabody', 'noticiabodyfull'],
        data() {
            return {
              user: {},
              full: false,

            }
        },
        mounted() {
            console.log('Component mounted.');

            this.user = JSON.parse(this.usern);

        }
    }
</script>
