const { default: axios } = require("axios");

new Vue({
    el: '#employees-container',
    data: {
        ready:false,
        employees: [],
        show: false,
    },
    methods : {
        getEmployees(){
            axios.get('/employees-vue/list').then(response => {
                this.employees = response.data.employees;
                this.ready     = true;
            }) 
        },

        edit(){
            axios.get(employee.id).then(response => {  
            })
        },
        
        update(employee){
            axios.put("employees-vue/", {
                params :{
                    'employee': employee.id,
                }
            })    
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
            console.log(e.target.className);
            if(e.target.localName != "button" && e.target.localName != "i" && e.target.className != "delete-td")
            {
                location.href="/employees-vue/" + id;
            }
        },

        buttom(){ 
            this.show = this.show == true ? false : true;
        },
    },
  
    mounted(){
        this.getEmployees();
    }
})