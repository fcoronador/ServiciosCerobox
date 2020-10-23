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
        :vehiculos="vehiculos"
        @onDelete="onDelete"
        @onEdit="onEdit"
      >
      </CustomerList>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import MyForm from "../components/MyForm";
import CustomerList from "../components/CustomerList";
import Loader from "../components/Loader";

export default {
  name: "Clientes",
  components: {
    MyForm,
    CustomerList,
    Loader,
  },
  data() {
    return {
      url: "http://localhost:8080/cliente",
      url2: "http://localhost:8080/vehiculo",
      customers: [],
      vehiculos: [],
      form: {
        id: "",
        nombre: "",
        numID: "",
        placa: "",
        tipo: "",
        cliente_id: "",
        isEdit: false,
      },
      loader: false,
    };
  },
  methods: {
    getCustomers() {
      this.loader = true;

      axios.get(this.url).then((data) => {
        this.customers = data.data;
        this.loader = false;
      });

      axios.get(this.url2).then((data) => {
        this.vehiculos = data.data;
        this.loader = false;
      });
    },
    deleteCustomer(id) {
      this.loader = true;

      axios
        .delete(`${this.url}/${id}`)
        .then(() => {
          this.getCustomers();
        })
        .catch((e) => {
          alert(e);
        });
    },
    createCustomer(data) {
      this.loader = true;

      axios
        .post(this.url, {
          nombre: data.nombre,
          numID: data.numID,
          /* email: data.email */
        })
        .then(() => {
          this.getCustomers();
        })
        .catch((e) => {
          alert(e);
        });
    },
    editCustomer(data) {
      this.loader = true;

      axios
        .put(`${this.url}/${data.id}`, {
          nombre: data.nombre,
          numID: data.numID,
          //email: data.email
        })
        .then(() => {
          this.getCustomers();
        })
        .catch((e) => {
          alert(e);
        });

      axios
        .post(this.url2, {
          nombre: data.nombre,
          placa: data.placa,
          tipo: data.tipo,
          cliente_id: data.id,
          /* email: data.email */
        })
        .then(() => {
          this.getCustomers();
        })
        .catch((e) => {
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
    },
  },
  created() {
    this.getCustomers();
  },
};
</script>

<style>
.vue-color {
  background: #41b883 !important;
}

.main.container {
  margin-top: 60px;
}

.submit-button {
  margin-top: 24px !important;
  float: right;
}

.data {
  margin-top: 15px;
}

thead tr th {
  background: #e0e0e0 !important;
}

.ui.inverted.dimmer {
  background-color: rgba(255, 255, 255, 0) !important;
}
</style>
