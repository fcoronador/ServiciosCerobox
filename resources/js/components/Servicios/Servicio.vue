<template>
  <div id="app">
    <div class="ui fixed inverted menu vue-color">
      <div class="ui container">
        <a href="#" class="header item">Control de Servicios</a>
      </div>
    </div>

    <div class="ui main container">
      <Form :form="form" @onFormSubmit="onFormSubmit" />
      <Loader v-if="loader" />
      <DetailList
        :servicios="servicios"
        :detalles="detalles"
        @onDelete="onDelete"
        @onEdit="onEdit"
      />
    </div>
  </div>
</template>

<script>
import axios from "axios";
import Form from "./Form";
import DetailList from "./DetailList";
import Loader from "../Loader";

export default {
  name: "App",
  components: {
    Form,
    DetailList,
    Loader
  },
  data() {
    return {
      url: "http://localhost:8080/servicios",
      servicios: [],
      detalles:[],
      form: {nombre: "", img: "", Tservcio: "", FechaIni: "", FechaFin: "", obser: "", isEdit: false }, 
      loader: false
    };
  },
  methods: {
    getDetalles() {

      this.loader = true;

      axios.get(`${this.url}`).then(data => {
       
        this.servicios = data.data;
        this.loader = false;
      });
    },
    deleteDetalles(id) {
      this.loader = true;

      axios.delete(`${this.url}/${id}`)
        .then(() => {
          this.getDetalles();
        })
        .catch(e => {
          alert(e);
        });
    },
    createDetalles(data) {
      this.loader = true;

      axios.post(this.url, {
          nombre:data.nombre,
          img:data.img,
          Tservcio:data.Tservcio,
          FechaIni:data.FechaIni,
          FechaFin:data.FechaFin,
          obser:data.obser
        })
        .then(() => {
          this.getDetalles();
        })
        .catch(e => {
          alert(e);
        });
    },
    editDetalles(data) {
      this.loader = true;

      axios
        .put(`${this.url}/${data.id}`, {
           nombre:data.nombre,
           img:data.img,
           Tservcio:data.Tservcio,
           FechaIni:data.FechaIni,
           FechaFin:data.FechaFin,
           obser:data.obser
        })
        .then(() => {
          this.getDetalles();
        })
        .catch(e => {
          alert(e);
        });
    },
    onDelete(id) {
      // window.console.log("app delete " + id);

      this.deleteDetalles(id);
    },
    onEdit(data) {
      // window.console.log("app edit ", data);

      this.form = data;
      this.form.isEdit = true;
    },
    onFormSubmit(data) {
      // window.console.log("app onFormSubmit", data);

      if (data.isEdit) {
        
        this.editDetalles(data);
      } else {
        
        this.createDetalles(data);
      }
    }
  },
  created() {
    this.getDetalles();
  }
};
</script>

