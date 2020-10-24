<template>
 <div class="list d-inline-flex mx-2">
    <Card
        v-for="detalle in detalles"
        :key="detalle.id"
        :detalle="detalle"/>
    <div class="">
      <table class="table" id="table_id">
        <thead>
          <tr>
            <th style="text-align: center">#</th>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Tipo de servicio</th>
            <th>Fecha de inicio</th>
            <th>Fecha de fin</th>
            <th>Observaciones</th>
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
    detalles: {
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


