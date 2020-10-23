<template>
  <tr>
    <td>{{ customer.id }}</td>
    <td><img :src="customer.img" alt="" srcset=""></td>
    <td>{{ customer.cedula }}</td>
    <td>  <a :href="'http://localhost:8080/clientes/'+customer.id"> {{ customer.nombre }} </a> </td>
    <td>{{ customer.correo }}</td>
    <td>{{ customer.telefono }}</td>
    <td>{{ customer.obser }}</td>
    <td>
      <button class="mini ui blue button" @click="onEdit">Editar</button>
      <button class="mini ui red button" @click="onDelete">Borrar</button>
    </td>
  </tr>
</template>

<script>
export default {
  name: "Customer",
  props: {
    customer: {
      type: Object
    }
  },
  methods: {
    onDelete() {
      // window.console.log("customer delete " + this.customer.id);
      this.$emit("onDelete", this.customer.id);
    },
    onEdit() {
      // window.console.log("customer edit " + this.customer.id);
      this.$emit("onEdit", this.customer);
    }
  }
};
</script>

<style scoped></style>
