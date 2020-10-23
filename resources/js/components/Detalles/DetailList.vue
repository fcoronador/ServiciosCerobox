<template>
 <div class="list d-inline-flex mx-2">
    <Card
        v-for="servicio in servicios"
        :key="servicio.id"
        :servicio="servicio"/>
    <div class="">
      <table class="ui celled table col-8">
        <thead>
          <tr>
            <th style="width: 50px; text-align: center">#</th>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Tipo de servicio</th>
            <th>Fecha de inicio</th>
            <th>Fecha de fin</th>
            <th>Servicios</th>
            <th>Observaciones</th>
            <th style="width: 148px">Opciones</th>
          </tr>
        </thead>

        <tbody>
          <Detail
            v-for="servicio in servicios"
            :key="servicio.id"
            :servicio="servicio"
            @onDelete="onDelete"
            @onEdit="onEdit"
          />
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import Detail from "./Detail";
import Card from "./Card";
export default {
  name: "DetailList",
  components: {
    Detail,
    Card,
  },
  props: {
    servicios: {
      type: Array,
    },
  },
  methods: {
    onDelete(id) {
      // window.console.log("customer list delete " + id);
      this.$emit("onDelete", id);
    },
    onEdit(data) {
      // window.console.log("customer list edit " + data);
      this.$emit("onEdit", data);
    },
  },
};
</script>


