var app = new Vue({
    el: '#app',
    data: {
        nama_barang: '',
        jumlah: '',
        table: '',
    },
    watch: {
        jumlah: function (){
            this.table += '<tr><td>'+this.nama_barang+'</td><td>'+this.jumlah+'</td></tr>'
        },
    }
});