//creo las variables para cada uno de los inputs del form
var id= document.getElementById("id");
var descripcion= document.getElementById("descripcion");
var tipoTemp= document.getElementById("tipoTemp");
var rangoMin= document.getElementById("rangoMin");
var rangoMax= document.getElementById("rangoMax");
var local= document.getElementById("local");
var seccion= document.getElementById("seccion");
var estado= document.getElementById("estado");
var tempVacio= document.getElementById("tempVacio");
var etiqueta= document.getElementById("etiqueta");
var impreso= document.getElementById("impreso");
var activo= document.getElementById("activo");

console.log(tempVacio);
console.log(rangoMin.value);

if(tipoTemp.value==0){
    rangoMin.value==-45;
}