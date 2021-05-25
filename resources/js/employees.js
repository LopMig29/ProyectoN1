const { default: axios } = require("axios");

new Vue({
    el: '#employees-container',
    data: {
        employees: [],
    },
    methods : {
        getEmployeess(){
            axios.get('/employees-vue/list').then(response => {
                console.log(response.data)
                this.employees = response.data.employees
            }) 
        },
        createEmployee(){
            // axios.get()
        },

        edit(){
            axios.get(employee.id).then(response => {
                
            })
        },
        
        update(employee){
            axios.put(`empleado-vue/`, {
                params :{
                    'employees': employee.id,
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
        extraerAFP(sueldo){
            return (2.87 / 100) * sueldo
        },
    
        extraerARS(sueldo){
            return (3.04/100) * sueldo
        },
    
        extraerISR(sueldo){
            return (15 / 100) * sueldo
        },

        extraerSueldoNeto(sueldo){
            sueldo - (2.87 + 3.04 + 15)
        },
    },
  
mounted(){
    this.getEmployeess();
    }
})