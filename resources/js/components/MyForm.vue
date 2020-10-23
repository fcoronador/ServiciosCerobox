<template>
  <div class="my-form">
    <form class="ui form">
      <div class="fields">
        <div class="four wide field">
          <label>Nombre</label>
          <input
            type="text"
            name="nombre"
            placeholder="nombre"
            @change="handleChange"
            :value="form.nombre"
          />
        </div>

        <div class="four wide field">
          <label>Número de  ID</label>
          <input
            type="number"
            name="numID"
            placeholder="ID"
            @change="handleChange"
            :value="form.numID"
          />
        </div>
         <div :class="campoPlaca" class="four wide field">
          <label>Placa</label>
          <input
            type="text"
            name="placa"
            placeholder="placa"
            @change="handleChange"
            :value="form.placa"
          />
        </div>

        <div :class="campoTipo" class="five wide field">
          <label>Tipo de Vehículo</label>
          <input 
            type="text"
            name="tipo"
            placeholder="A para auto, M para moto y B para bicicleta"
            @change="handleChange"
            :value="form.tipo"
          />
        </div>

        <div class="six wide field">
          <!-- <label>E-mail</label>
          <input
            type="email"
            name="email"
            placeholder="joe@gmail.com"
            @change="handleChange"
            :value="form.email"
          /> -->
        </div>

        <div class="two wide field">
          <button :class="btnClass" @click="onFormSubmit">
            {{ btnName }}
          </button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  name: "MyForm",
  data() {
    return {
      btnName: "Guardar",
      btnClass: "ui primary button submit-button",
      campoPlaca: "collapse",
      campoTipo: "collapse"
    };
  },
  props: {
    form: {
      type: Object
    }
  },
  methods: {
    handleChange(event) {
      const { name, value } = event.target;
      let form = this.form;
      form[name] = value;
      this.form = form;
    },
    onFormSubmit(event) {
      // prevent form submit
      event.preventDefault();

      // form validation
      if (this.formValidation()) {
        // window.console.log("ready to submit");
        this.$emit("onFormSubmit", this.form);

        // change the button to save
        this.btnName = "Guardar";
        this.btnClass = "ui primary button submit-button";
        this.campoPlaca = "collapse";
        this.campoTipo = "collapse";

        // clear form fields
        this.clearFormFields();
      }
    },
    formValidation() {
      // first name
      if (document.getElementsByName("nombre")[0].value === "") {
        alert("Ingresa un nombre");
        return false;
      }

      if (document.getElementsByName("numID")[0].value === "") {
        alert("Ingresa un número de identificación");
        return false;
      }

      if (document.getElementsByName("placa")[0].value === "") {
        alert("Ingresa un número de placa");
        return false;
      }

      if (document.getElementsByName("tipo")[0].value === "") {
        alert("Ingresa un tipo de vehículo");
        return false;
      }

      // email
      /* if (document.getElementsByName("email")[0].value === "") {
        alert("Enter email");
        return false;
      } */

      return true;
    },
    clearFormFields() {
      // clear form data
      this.form.nombre = "";
      this.form.numID = "";
      this.form.placa = "";
      this.form.tipo = "";
      /* this.form.email = ""; */
      this.form.isEdit = false;

      // clear form fields
      document.querySelector(".form").reset();
    }
  },
  updated() {
    if (this.form.isEdit) {
      this.btnName = "Actualizar";
      this.btnClass = "ui orange button submit-button";
      this.campoPlaca = "show";
      this.campoTipo = "show";

    }
  }
};
</script>

<style scoped></style>
