<template>
  <div id="app">
    <div class="ui fixed inverted menu vue-color">
      <div class="ui container">
        <a href="#" class="header item">Gestion Clientes</a>
      </div>
    </div>

    <div class="ui main container">
      <MyForm :form="form" @onFormSubmit="onFormSubmit" />
      <Loader v-if="loader" />
      <CustomerList
        :customers="customers"
        @onDelete="onDelete"
        @onEdit="onEdit"
      />
    </div>
  </div>
</template>

<script>
import axios from "axios";
import MyForm from "./MyForm";
import CustomerList from "./CustomerList";
import Loader from "./Loader";

export default {
  name: "App",
  components: {
    MyForm,
    CustomerList,
    Loader
  },
  data() {
    return {
      url: "http://localhost:8080/clientes", 
      customers: [],
      form: {nombre:"",cedula:"",correo:"",telefono:"",obser:"",img:"", isEdit: false }, 
      loader: false
    };
  },
  methods: {
    getCustomers() {
      this.loader = true;

      axios.get(this.url).then(data => {
        this.customers = data.data;
        this.loader = false;
      });
    },
    deleteCustomer(id) {
      this.loader = true;

      axios.delete(`${this.url}/${id}`)
        .then(() => {
          this.getCustomers();
        })
        .catch(e => {
          alert(e);
        });
    },
    createCustomer(data) {
      this.loader = true;

      axios.post(this.url, {
          nombre:data.nombre,
          cedula:data.cedula,
          correo:data.correo,
          telefono:data.telefono,
          obser:data.obser,
          img:data.img
        })
        .then(() => {
          this.getCustomers();
        })
        .catch(e => {
          alert(e);
        });
    },
    editCustomer(data) {
      this.loader = true;

      axios
        .put(`${this.url}/${data.id}`, {
          nombre:data.nombre,
          cedula:data.cedula,
          correo:data.correo,
          telefono:data.telefono,
          obser:data.obser,
          img:data.img
        })
        .then(() => {
          this.getCustomers();
        })
        .catch(e => {
          alert(e);
        });
    },
    onDelete(id) {
      // window.console.log("app delete " + id);

      this.deleteCustomer(id);
    },
    onEdit(data) {
      // window.console.log("app edit ", data);

      this.form = data;
      this.form.isEdit = true;
    },
    onFormSubmit(data) {
      // window.console.log("app onFormSubmit", data);

      if (data.isEdit) {
        // call edit customer
        this.editCustomer(data);
      } else {
        // call create customer
        this.createCustomer(data);
      }
    }
  },
  created() {
    this.getCustomers();
  }
};
</script>

