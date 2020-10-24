<template>
  
    <tr>
      <td>{{ servicio.id }}</td>
      <td><img :src="servicio.img" alt="" srcset="" /></td>
      <td>{{ servicio.nombre }}</td>
      <td v-if="servicio.Tservcio === 1">Básico</td>
      <td v-else>Avanzado</td>
      <td>{{ servicio.FechaIni }}</td>
      <td>{{ servicio.FechaFin }}</td>
      <td>{{ servicio.obser }}</td>

      <td>
        <button class="mini ui blue button" @click="onEdit">Editar</button>
        <button class="mini ui red button" @click="onDelete">Borrar</button>
      </td>
    </tr>

</template>

<script>


export default {
  name: "Detail",
  components: {
      
  },
  props: {
    servicio: {
      type: Object,
    },
  },
  methods: {
    onDelete() {
      // window.console.log("customer delete " + this.customer.id);
      this.$emit("onDelete", this.servicio.id);
    },
    onEdit() {
      // window.console.log("customer edit " + this.customer.id);
      this.$emit("onEdit", this.servicio);
    },
  },
};
</script>


