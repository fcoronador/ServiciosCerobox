<template>
  <tr>
    <td>{{ customer.id }}</td>
    <td>{{ customer.nombre }}</td>
    <td>{{ customer.numID }}</td>
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
