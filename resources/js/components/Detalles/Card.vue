<template>
  <div class="card col-3 mx-3">
    <img class="card-img" :src="detalle.img" width="200px" alt="" />
    <div class="card-body">
      <h4 class="card-title">{{ detalle.nombre }} CC:{{ detalle.cedula }}</h4>
      <p class="card-text">
        <strong>ID:</strong>{{ detalle.id }}
        <br>
        <strong>Correo:</strong>{{ detalle.correo }}
        <br>
        <strong>Télefono:</strong>{{ detalle.telefono }}
        <br>
        <strong>Observaciones:</strong>{{ detalle.obser }}
        <br>
      </p>
    </div>
  </div>
</template>

<script>
export default {
  name: "Card",
  props: {
    detalle: {
      type: Object,
    },
  },
};
</script>
