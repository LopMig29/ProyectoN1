<template>
  <div id = "clock-container">
    <span>
      <i class="far fa-clock"></i>
      {{weekDays[clock.weekday]}} {{clock.day}} de {{months[clock.month]}}
      {{hour}}:{{minutes}}:{{seconds}} {{meridian}}
    </span>
  </div>
</template>

<script>
  const { DateTime } = require("luxon"); //Luxon = Capturar el momento

  export default {
    data () {
      return {
        clock           :     {},
        weekDays        :     ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"],
        months          :     ["","Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
      }
    },
    computed: { //Funcion dinamica
      meridian() {
        return this.clock.hour < 12 ? 'AM' : 'PM';
      },

      hour() {
        let hour = this.clock.hour > 12 ?  this.clock.hour - 12 : this.clock.hour;
        return hour < 10 ? "0" + hour : hour;
      },

      minutes(){
        return this.clock.minute < 10 ? "0" + this.clock.minute : this.clock.minute;
      },

      seconds(){
        return this.clock.second < 10 ? "0" + this.clock.second : this.clock.second;
      }
    },
    
    mounted(){ //Ejecuta luego de cargar la vista
      setInterval(() => {
        this.clock = DateTime.now();
        this.weekDays[this.clock.weekday];
        this.months[this.clock.month];
      },1000);
    }
  }
</script>

<style>
  #clock-container{
    display: inline-block;
    font-size: 14px;
    background: #F4F6F6;
    border-width: 1px;
  }
</style>