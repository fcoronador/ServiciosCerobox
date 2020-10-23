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
          <label>Cédula</label>
          <input
            type="number"
            name="cedula"
            placeholder="ID"
            @change="handleChange"
            :value="form.cedula"
          />
        </div>

        <div class="four wide field">
          <label>Correo</label>
          <input
            type="text"
            name="correo"
            placeholder="email@correo.com"
            @change="handleChange"
            :value="form.correo"
          />
        </div>

        <div class="four wide field">
          <label>Teléfono</label>
          <input
            type="number"
            name="telefono"
            placeholder="2004458"
            @change="handleChange"
            :value="form.telefono"
          />
        </div>
         <div class="four wide field">
          <label>Observación</label>
          <input
            type="text"
            name="obser"
            placeholder="Observaciones"
            @change="handleChange"
            :value="form.obser"
          />
        </div>
         <div class="four wide field">
          <label>Imagen</label>
          <input
            type="text"
            name="img"
            placeholder="Url de la imagen"
            @change="handleChange"
            :value="form.img"
          />
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
      btnClass: "ui primary button submit-button"
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

     
      if (document.getElementsByName("cedula")[0].value === "") {
        alert("Ingresa un número de identificación");
        return false;
      }
      if (document.getElementsByName("correo")[0].value === "") {
        alert("Ingresa un correo");
        return false;
      }
      if (document.getElementsByName("telefono")[0].value === "") {
        alert("Ingresa un teléfono");
        return false;
      }
      if (document.getElementsByName("obser")[0].value === "") {
        alert("Ingresa una observación");
        return false;
      }
      if (document.getElementsByName("img")[0].value === "") {
        alert("Ingresa una url");
        return false;
      }

     

      return true;
    },
    clearFormFields() {
      // clear form data
      this.form.nombre = "";
      this.form.cedula = "";
      this.form.correo = "";
      this.form.telefono = "";
      this.form.obser = "";
      this.form.img = "";
      
      this.form.isEdit = false;

      // clear form fields
      document.querySelector(".form").reset();
    }
  },
  updated() {
    if (this.form.isEdit) {
      this.btnName = "Actualizar";
      this.btnClass = "ui orange button submit-button";
    }
  }
};
</script>

<style scoped></style>
