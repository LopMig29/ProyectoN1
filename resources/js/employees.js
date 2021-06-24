const { default: axios } = require("axios");

new Vue({
    el: '#employees-container',
    data: {
        ready: false,
        employees: {},
        show: false,
        searchBy: '',
    },

    methods : {  //Funciones estaticas
        getEmployees(page = 1){ //Respuesta del servidor
            axios.get('/employees-vue/list?page=' + page + '&' + 'searchBy' + '=' + this.searchBy).then(response => {
                this.employees = response.data.employees;
                this.ready = true;
            });
        },

        confirmDestroy(id){
            swal({
                title: "Estas seguro?",
                text: "Una vez eliminado, ¡no podrás revertir la accion!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
              }).then((willDelete) => {
                if (willDelete) {
                    this.destroy(id);
                }
            });
        },

        destroy(id){
            axios.delete('/employees-vue/'+id).then(response => {
                if(response.data.success){
                    swal("Empleado Eliminado",{
                        icon : 'success'
                    });
                    this.getEmployees();
                }
            });
        },

        formatNumber(n){
            return Intl.NumberFormat("en-US").format(Math.round(n))
        },

        edit(e,id){
            if(e.target.localName != "a" && e.target.localName != "i" && e.target.className != "delete-td") //target.localName = Encontrar objeto especifico
            {
                location.href="/employees-vue/" + id;
            }
        },

        buttom(){
            this.show = this.show == true ? false : true;
            // this.show = !this.show;
        },
    },

    mounted(){ //Ejecuta luego de cargar la vista
        this.getEmployees();
    },

    computed: {  //Funciones dinamicas

    },
})