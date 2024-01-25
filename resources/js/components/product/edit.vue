<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5> Información Producto </h5>
                </div>
                <div class="ibox-content">
                    <div v-if="mensaje_susses!=''" class="alert alert-success" role="alert">
                        {{ this.mensaje_susses }}
                    </div>
                    <form method="post" action="#" autocomplete="off"
                          @submit.prevent="update_object()">
                        <div class="ibox-content m-b-sm border-bottom">
                            <div class="row justify-content-center">
                                <div class="col-lg-3" v-for="(tipo,k) in tipos" :key="k">
                                    <div :class="'widget style1 ' + class_exist_element(tipo)"
                                         @click="seleccionar_tipo(tipo)">
                                        <div class="row vertical-align">
                                            <div class="col-3">
                                                <i class="fa fa-user fa-3x"></i>
                                            </div>
                                            <div class="col-9 text-right">
                                                <h3 class="font-bold">{{ tipo.nombre }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <template v-if="listado===1">
                                <div class="row justify-content-center">
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                                <label class="col-form-label" for="codigo">Codigo</label>
                                                <input type="text"
                                                       v-bind:class="[form.errors.errors.codigo ? 'form-control is-invalid' : 'form-control']"
                                                       placeholder="Codigo"
                                                       v-model="form.codigo">
                                                <span class="text-error is-invalid"
                                                      v-if="form.errors.errors.codigo">{{
                                                        form.errors.errors.codigo[0]
                                                    }}</span>
                                            </div>
                                            <div class="col-lg-6 col-md-8 col-sm-8 col-xs-10">
                                                <label class="col-form-label" for="Nombre">Nombre</label>
                                                <input type="text"
                                                       v-bind:class="[form.errors.errors.nombre ? 'form-control is-invalid' : 'form-control']"
                                                       placeholder="Nombre"
                                                       v-model="form.nombre">
                                                <span class="text-error" style="color: red;"
                                                      v-if="form.errors.errors.nombre">{{
                                                        form.errors.errors.nombre[0]
                                                    }}</span>
                                            </div>
                                            <div class="col-lg-2 col-md-4 col-sm-4 col-xs-2">
                                                <label class="col-form-label" for="r">Receta Médica</label>
                                                <div><input type="checkbox" class="icheckbox_square-green "
                                                            v-model="form.receta"
                                                >
                                                </div>
                                                {{ form.receta }}
                                            </div>

                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <label class="col-form-label" for="descripcion">Descripcion</label>
                                                <textarea type="text" class="form-control" placeholder="Descripcion"
                                                          v-model="form.descripcion" rows="4"></textarea>
                                                <span class="text-error"
                                                      v-if="form.errors.errors.descripcion">{{
                                                        form.errors.errors.descripcion[0]
                                                    }}</span>
                                            </div>

                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                <label class="col-form-label" for="contedino">Contenido</label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control col-8" placeholder="Contenido"
                                                           v-model="form.contenido">
                                                    <select id="cars" class="form-control col-4"
                                                            v-model="form.unidad_medida">
                                                        <option selected="selected" value="" disabled>Unidad</option>
                                                        <option v-for="(unidad,k) in unidades" :value="unidad" :key="k">
                                                            {{ unidad }}
                                                            <!-- v-for="(farmaco,key) in farmacos"   :value="farmaco.id" :key="key" -->
                                                        </option>
                                                    </select>
                                                </div>
                                                <span class="text-error"
                                                      v-if="form.errors.errors.contenido">{{
                                                        form.errors.errors.contenido[0]
                                                    }}</span>
                                                <span class="text-error"
                                                      v-if="form.errors.errors.unidad">{{
                                                        form.errors.errors.unidad[0]
                                                    }}</span>
                                            </div>
                                            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                                <label class="col-form-label" for="precio">Precio</label>
                                                <input type="number" class="form-control" placeholder="Precio"
                                                       v-model="form.precio">
                                                <span class="text-error"
                                                      v-if="form.errors.errors.precio">{{
                                                        form.errors.errors.precio[0]
                                                    }}</span>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                                                <div class="form-group">
                                                    <label class="col-form-label">Forma</label>
                                                    <v-select
                                                        class="style-chooser  "
                                                        v-model="forma"
                                                        :clearable="false"
                                                        placeholder="Forma .."
                                                        label="nombre"
                                                        :filterable="true"
                                                        :options="formas"
                                                        style="box-shadow: inset 0px 0px 5px #d5d5d5"
                                                        required>
                                                    </v-select>
                                                </div>
                                            </div>

                                            <div class="col-sm-9 col-md-9 col-sm-9 col-xs-10">
                                                <label class="col-form-label" for="nombre_generico">Nombre Generico</label>
                                                <input type="text"
                                                       v-bind:class="[form.errors.errors.nombre_generico ? 'form-control is-invalid' : 'form-control']"
                                                       placeholder="Nombre Generico"
                                                       v-model="form.nombre_generico" disabled>
                                                <span class="text-error" style="color: red;"
                                                      v-if="form.errors.errors.nombre_generico">{{
                                                        form.errors.errors.nombre_generico[0]
                                                    }}</span>
                                            </div>

                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-2">
                                                <label class="col-form-label" for="r">Producto Generico</label>
                                                <div><input type="checkbox" class="icheckbox_square-green " id="r"
                                                            v-model="form.generico"
                                                >
                                                </div>
                                            </div>

                                            <div class="col-sm-6 col-sm-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label class="col-form-label">Laboratorio</label>
                                                    <v-select
                                                        class="style-chooser basic "
                                                        v-model="laboratorio"
                                                        :clearable="false"
                                                        placeholder="Laboratorio .."

                                                        label="nombre"
                                                        :filterable="true"
                                                        :options="laboratorios"
                                                        style="box-shadow: inset 0px 0px 5px #d5d5d5"
                                                        required>
                                                    </v-select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-sm-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label class="col-form-label">Categoria</label>
                                                    <v-select
                                                        class="style-chooser"
                                                        v-model="categoria"
                                                        :clearable="false"
                                                        placeholder="Categoria .."
                                                        label="nombre"
                                                        :filterable="true"
                                                        :options="categorias"
                                                        style="box-shadow: inset 0px 0px 5px #d5d5d5"
                                                        required>
                                                    </v-select>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <label class="col-form-label" for="indicaciones">Indicaciones</label>
                                                <textarea type="text"
                                                          v-bind:class="[form.errors.errors.indicaciones ? 'form-control is-invalid' : 'form-control']"
                                                          placeholder="Indicaciones"
                                                          v-model="form.indicaciones" rows="4"></textarea>
                                                <span class="text-error is-invalid"
                                                      v-if="form.errors.errors.indicaciones">{{
                                                        form.errors.errors.indicaciones[0]
                                                    }}</span>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <label class="col-form-label" for="advertencias">Advertencias</label>
                                                <textarea type="text"
                                                          v-bind:class="[form.errors.errors.advertencias ? 'form-control is-invalid' : 'form-control']"
                                                          placeholder="Advertencias"
                                                          v-model="form.advertencia" rows="4"></textarea>
                                                <span class="text-error" style="color: red;"
                                                      v-if="form.errors.errors.advertencia">{{
                                                        form.errors.errors.advertencia[0]
                                                    }}</span>
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="row justify-content-center">
                                            <div class="col-lg-12">
                                                <h2 class="w-100">
                                                    Composicion
                                                    <button type="button" class="btn btn-sm btn-success"
                                                            @click="add_component"><i class="fa fa-plus"></i></button>
                                                </h2>
                                                <table class="table table-bordered table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>Farmaco</th>
                                                        <th>Cantidad</th>
                                                        <th>Principio activo</th>
                                                        <th>Opcion</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr v-for="(composicion,key) in form.array_composicion" :key="key">
                                                        <td class="w-25">
                                                            <input type="text" class="form-control col-8"
                                                                   placeholder="Cantidad"
                                                                   v-model="composicion.nombre">

                                                        </td>
                                                        <td class="w-50">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control col-8"
                                                                       placeholder="Cantidad"
                                                                       v-model="composicion.pivot.cantidad">
                                                                <input type="text" class="form-control col-4"
                                                                       placeholder="Cantidad"
                                                                       v-model="composicion.pivot.unidad_medida">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="">
                                                                <input type="checkbox"
                                                                       class="form-control col-8  icheckbox_square-green"
                                                                       v-model="composicion.pivot.principio_activo">
                                                            </div>

                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-sm btn-danger"
                                                                    @click="quitar_composicion(composicion)"><i
                                                                class="fa fa-remove"></i></button>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </template>

                            <template v-if="listado===2">
                                <div class="row justify-content-center">
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                <label class="col-form-label" for="codigo">Codigo</label>
                                                <input type="text"
                                                       v-bind:class="[form.errors.errors.codigo ? 'form-control is-invalid' : 'form-control']"
                                                       placeholder="Codigo"
                                                       v-model="form.codigo">
                                                <span class="text-error is-invalid"
                                                      v-if="form.errors.errors.codigo">{{
                                                        form.errors.errors.codigo[0]
                                                    }}</span>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                <label class="col-form-label" for="Nombre">Nombre</label>
                                                <input type="text"
                                                       v-bind:class="[form.errors.errors.nombre ? 'form-control is-invalid' : 'form-control']"
                                                       placeholder="Nombre"
                                                       v-model="form.nombre">
                                                <span class="text-error" style="color: red;"
                                                      v-if="form.errors.errors.nombre">{{
                                                        form.errors.errors.nombre[0]
                                                    }}</span>
                                            </div>

                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <label class="col-form-label" for="descripcion">Descripcion</label>
                                                <textarea type="text" class="form-control" placeholder="Descripcion"
                                                          v-model="form.descripcion" rows="4"></textarea>
                                                <span class="text-error"
                                                      v-if="form.errors.errors.descripcion">{{
                                                        form.errors.errors.descripcion[0]
                                                    }}</span>
                                            </div>

                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                <label class="col-form-label" for="contedino">Contenido</label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control col-8" placeholder="Contenido"
                                                           v-model="form.contenido">
                                                    <select id="cars" class="form-control col-4"
                                                            v-model="form.unidad_medida">
                                                        <option selected="selected" value="" disabled>Unidad</option>
                                                        <option v-for="(unidad,k) in unidades" :value="unidad" :key="k">
                                                            {{ unidad }}
                                                            <!-- v-for="(farmaco,key) in farmacos"   :value="farmaco.id" :key="key" -->
                                                        </option>
                                                    </select>
                                                </div>
                                                <span class="text-error"
                                                      v-if="form.errors.errors.contenido">{{
                                                        form.errors.errors.contenido[0]
                                                    }}</span>
                                                <span class="text-error"
                                                      v-if="form.errors.errors.unidad">{{
                                                        form.errors.errors.unidad[0]
                                                    }}</span>
                                            </div>
                                            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                                <label class="col-form-label" for="precio">Precio</label>
                                                <input type="number" class="form-control" placeholder="Precio"
                                                       v-model="form.precio">
                                                <span class="text-error"
                                                      v-if="form.errors.errors.precio">{{
                                                        form.errors.errors.precio[0]
                                                    }}</span>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                                                <div class="form-group">
                                                    <label class="col-form-label">Forma</label>
                                                    <v-select
                                                        class="style-chooser  "
                                                        v-model="forma"
                                                        :clearable="false"
                                                        placeholder="Forma .."
                                                        label="nombre"
                                                        :filterable="true"
                                                        :options="formas"
                                                        style="box-shadow: inset 0px 0px 5px #d5d5d5"
                                                        required>
                                                    </v-select>
                                                </div>
                                            </div>


                                            <div class="col-sm-6 col-sm-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label class="col-form-label">Laboratorio</label>
                                                    <v-select
                                                        class="style-chooser basic "
                                                        v-model="laboratorio"
                                                        :clearable="false"
                                                        placeholder="Laboratorio .."

                                                        label="nombre"
                                                        :filterable="true"
                                                        :options="laboratorios"
                                                        style="box-shadow: inset 0px 0px 5px #d5d5d5"
                                                        required>
                                                    </v-select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-sm-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label class="col-form-label">Categoria</label>
                                                    <v-select
                                                        class="style-chooser"
                                                        v-model="categoria"
                                                        :clearable="false"
                                                        placeholder="Categoria .."
                                                        label="nombre"
                                                        :filterable="true"
                                                        :options="categorias"
                                                        style="box-shadow: inset 0px 0px 5px #d5d5d5"
                                                        required>
                                                    </v-select>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <label class="col-form-label" for="indicaciones">Indicaciones</label>
                                                <textarea type="text"
                                                          v-bind:class="[form.errors.errors.indicaciones ? 'form-control is-invalid' : 'form-control']"
                                                          placeholder="Indicaciones"
                                                          v-model="form.indicaciones" rows="4"></textarea>
                                                <span class="text-error is-invalid"
                                                      v-if="form.errors.errors.indicaciones">{{
                                                        form.errors.errors.indicaciones[0]
                                                    }}</span>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <label class="col-form-label" for="advertencias">Advertencias</label>
                                                <textarea type="text"
                                                          v-bind:class="[form.errors.errors.advertencias ? 'form-control is-invalid' : 'form-control']"
                                                          placeholder="Advertencias"
                                                          v-model="form.advertencia" rows="4"></textarea>
                                                <span class="text-error" style="color: red;"
                                                      v-if="form.errors.errors.advertencia">{{
                                                        form.errors.errors.advertencia[0]
                                                    }}</span>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </template>

                            <template v-if="listado===3">
                                <div class="row justify-content-center">
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                                <label class="col-form-label" for="codigo">Codigo</label>
                                                <input type="text"
                                                       v-bind:class="[form.errors.errors.codigo ? 'form-control is-invalid' : 'form-control']"
                                                       placeholder="Codigo"
                                                       v-model="form.codigo">
                                                <span class="text-error is-invalid"
                                                      v-if="form.errors.errors.codigo">{{
                                                        form.errors.errors.codigo[0]
                                                    }}</span>
                                            </div>
                                            <div class="col-lg-6 col-md-8 col-sm-8 col-xs-10">
                                                <label class="col-form-label" for="Nombre">Nombre</label>
                                                <input type="text"
                                                       v-bind:class="[form.errors.errors.nombre ? 'form-control is-invalid' : 'form-control']"
                                                       placeholder="Nombre"
                                                       v-model="form.nombre">
                                                <span class="text-error" style="color: red;"
                                                      v-if="form.errors.errors.nombre">{{
                                                        form.errors.errors.nombre[0]
                                                    }}</span>
                                            </div>
                                            <div class="col-lg-2 col-md-4 col-sm-4 col-xs-2">
                                                <label class="col-form-label" for="r">Receta Médica</label>
                                                <div><input type="checkbox" class="icheckbox_square-green " id="r"
                                                            v-model="form.receta"
                                                >
                                                </div>
                                                {{ form.receta }}
                                            </div>

                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <label class="col-form-label" for="descripcion">Descripcion</label>
                                                <textarea type="text" class="form-control" placeholder="Descripcion"
                                                          v-model="form.descripcion" rows="4"></textarea>
                                                <span class="text-error"
                                                      v-if="form.errors.errors.descripcion">{{
                                                        form.errors.errors.descripcion[0]
                                                    }}</span>
                                            </div>

                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                <label class="col-form-label" for="contedino">Contenido</label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control col-8" placeholder="Contenido"
                                                           v-model="form.contenido">
                                                    <select id="cars" class="form-control col-4"
                                                            v-model="form.unidad_medida">
                                                        <option selected="selected" value="" disabled>Unidad</option>
                                                        <option v-for="(unidad,k) in unidades" :value="unidad" :key="k">
                                                            {{ unidad }}
                                                            <!-- v-for="(farmaco,key) in farmacos"   :value="farmaco.id" :key="key" -->
                                                        </option>
                                                    </select>
                                                </div>
                                                <span class="text-error"
                                                      v-if="form.errors.errors.contenido">{{
                                                        form.errors.errors.contenido[0]
                                                    }}</span>
                                                <span class="text-error"
                                                      v-if="form.errors.errors.unidad">{{
                                                        form.errors.errors.unidad[0]
                                                    }}</span>
                                            </div>
                                            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                                <label class="col-form-label" for="precio">Precio</label>
                                                <input type="number" class="form-control" placeholder="Precio"
                                                       v-model="form.precio">
                                                <span class="text-error"
                                                      v-if="form.errors.errors.precio">{{
                                                        form.errors.errors.precio[0]
                                                    }}</span>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                                                <div class="form-group">
                                                    <label class="col-form-label">Forma</label>
                                                    <v-select
                                                        class="style-chooser  "
                                                        v-model="forma"
                                                        :clearable="false"
                                                        placeholder="Forma .."
                                                        label="nombre"
                                                        :filterable="true"
                                                        :options="formas"
                                                        style="box-shadow: inset 0px 0px 5px #d5d5d5"
                                                        required>
                                                    </v-select>
                                                </div>
                                            </div>

                                            <div class="col-sm-9 col-md-9 col-sm-9 col-xs-10">
                                                <label class="col-form-label" for="nombre_generico">Nombre Generico</label>
                                                <input type="text"
                                                       v-bind:class="[form.errors.errors.nombre_generico ? 'form-control is-invalid' : 'form-control']"
                                                       placeholder="Nombre Generico"
                                                       v-model="form.nombre_generico = rescatar_los_true" disabled>
                                                <span class="text-error" style="color: red;"
                                                      v-if="form.errors.errors.nombre_generico">{{
                                                        form.errors.errors.nombre_generico[0]
                                                    }}</span>
                                            </div>

                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-2">
                                                <label class="col-form-label" for="r">Producto Generico</label>
                                                <div><input type="checkbox" class="icheckbox_square-green " id="r"
                                                            v-model="form.generico"
                                                >
                                                </div>
                                            </div>

                                            <div class="col-sm-6 col-sm-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label class="col-form-label">Laboratorio</label>
                                                    <v-select
                                                        class="style-chooser basic "
                                                        v-model="laboratorio"
                                                        :clearable="false"
                                                        placeholder="Laboratorio .."

                                                        label="nombre"
                                                        :filterable="true"
                                                        :options="laboratorios"
                                                        style="box-shadow: inset 0px 0px 5px #d5d5d5"
                                                        required>
                                                    </v-select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-sm-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label class="col-form-label">Categoria</label>
                                                    <v-select
                                                        class="style-chooser"
                                                        v-model="categoria"
                                                        :clearable="false"
                                                        placeholder="Categoria .."
                                                        label="nombre"
                                                        :filterable="true"
                                                        :options="categorias"
                                                        style="box-shadow: inset 0px 0px 5px #d5d5d5"
                                                        required>
                                                    </v-select>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <label class="col-form-label" for="indicaciones">Indicaciones</label>
                                                <textarea type="text"
                                                          v-bind:class="[form.errors.errors.indicaciones ? 'form-control is-invalid' : 'form-control']"
                                                          placeholder="Indicaciones"
                                                          v-model="form.indicaciones" rows="4"></textarea>
                                                <span class="text-error is-invalid"
                                                      v-if="form.errors.errors.indicaciones">{{
                                                        form.errors.errors.indicaciones[0]
                                                    }}</span>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <label class="col-form-label" for="advertencias">Advertencias</label>
                                                <textarea type="text"
                                                          v-bind:class="[form.errors.errors.advertencias ? 'form-control is-invalid' : 'form-control']"
                                                          placeholder="Advertencias"
                                                          v-model="form.advertencia" rows="4"></textarea>
                                                <span class="text-error" style="color: red;"
                                                      v-if="form.errors.errors.advertencia">{{
                                                        form.errors.errors.advertencia[0]
                                                    }}</span>
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="row justify-content-center">
                                            <div class="col-lg-12">
                                                <h2 class="w-100">
                                                    Composicion
                                                    <button type="button" class="btn btn-sm btn-success"
                                                            @click="add_component"><i class="fa fa-plus"></i></button>
                                                </h2>
                                                <table class="table table-bordered table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>Farmaco</th>
                                                        <th>Cantidad</th>
                                                        <th>Principio activo</th>
                                                        <th>Opcion</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr v-for="(composicion,key) in form.array_composicion" :key="key">
                                                        <td class="w-25">
                                                            <input type="text" class="form-control col-8"
                                                                   placeholder="Cantidad"
                                                                   v-model="composicion.nombre">

                                                        </td>
                                                        <td class="w-50">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control col-8"
                                                                       placeholder="Cantidad"
                                                                       v-model="composicion.pivot.cantidad">
                                                                <input type="text" class="form-control col-4"
                                                                       placeholder="Cantidad"
                                                                       v-model="composicion.pivot.unidad_medida">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="">
                                                                <input type="checkbox"
                                                                       class="form-control col-8  icheckbox_square-green"
                                                                       v-model="composicion.pivot.principio_activo">
                                                            </div>

                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-sm btn-danger"
                                                                    @click="quitar_composicion(composicion)"><i
                                                                class="fa fa-remove"></i></button>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>

                                    </div>


                                </div>
                            </template>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4 col-sm-offset-2">
                                <a :href="url.cancel" class="btn btn-white btn-sm"
                                >Cancel</a>
                                <button class="btn btn-primary btn-sm" type="submit">Guardar</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>

</template>
<style scoped>
.form-control {
    padding: 5px 12px;
}

.style-chooser .vs__open-indicator {
    fill: rgba(100, 100, 100, 100);
    transform: scale(0.65);
    transition: transform .15s cubic-bezier(1, -.115, .975, .855);
    transition-timing-function: cubic-bezier(1, -.115, .975, .855);
}

.style-chooser .vs__dropdown-toggle,
.style-chooser .vs__selected-options {
    overflow: hidden;
    text-overflow: ellipsis;
    height: 30px;
    white-space: nowrap;
}

.style-chooser .vs__dropdown-menu {
    color: grey;
    font-variant: small;
}
</style>


<script>
import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css'

export default {
    props: ['producto', 'laboratorios', 'categorias', 'formas', 'tipos', 'unidades', 'farmacos', 'userss'],

    data() {
        return {
            mensaje_susses: '',
            url: {
                update: '/productos',
                cancel: '/productos',
            },
            listado: 1,
            form: new Forms({
                id: null,
                codigo: '',
                nombre: this.userss.name,
                receta: false,
                generico: false,
                descripcion: '',
                nombre_generico: '',
                precio: '',
                contenido: '0',
                unidad_medida: '',
                indicaciones: '',
                advertencia: '',
                laboratorio_id: '',
                categoria_id: '',
                forma_id: '',
                tipo_id: '',
                array_composicion: [],
            }),
            peticion: false,
            errorsEmail: [],
            laboratorio: '',
            categoria: '',
            forma: '',
            tipo: '',
            unidad: '',
        };
    },
    mounted() {
        let me = this;
        me.form.reset();
        me.form.fill(me.producto);
        me.form.array_composicion = me.producto.composicion;
        console.log(me.form.array_composicion)
        me.forma = me.producto.forma;
        me.laboratorio = me.producto.laboratorio;
        me.categoria = me.producto.categoria;
        me.tipo = me.producto.tipo;
        me.form.receta = false;
        if(me.producto.receta == 1){
            me.form.receta = true;
        }
        me.form.generico = false;
        if(me.producto.generico == 1){
            me.form.generico = true;
        }


        // me.tipo = this.tipos[0];

    },
    watch: {
        laboratorio: function (val) {
            let me = this;
            me.form.laboratorio_id = val.id;
        },
        categoria: function (val) {
            let me = this;
            me.form.categoria_id = val.id;
        },
        forma: function (val) {
            let me = this;
            me.form.forma_id = val.id;
        },
        tipo: function (val) {
            let me = this;
            switch (val.nombre) {
                case "MEDICAMENTOS":
                    me.listado = 1;
                    break;
                case "INSTRUMENTOS":
                    me.listado = 2;
                    break;
                case "NORMAL":
                    me.listado = 3;
                    break;
            }
            me.form.tipo_id = val.id;
        },


    },
    computed: {
        // rescatar_los_true() {
        //     let me = this;
        //     let nuevo = '';
        //     me.form.array_composicion.forEach(element => {
        //         if (element.principio_activo) {
        //             nuevo += '( ' + element.farmaco_nombre + ' ' + element.cantidad + ' ' + element.unidad + ' )';
        //             // nuevo.push(element);
        //         }
        //     });
        //     me.form.nombre_generico = nuevo;
        //     return me.form.nombre_generico;
        // },

    },
    methods: {


        update_object() {
            let me = this;
            console.log(me.form);
            me.form.put(me.url.update +'/'+me.producto.id)
                .then(function (response) {
                    // window.scrollTo(0,0);
                    me.moveTo();
                    me.mensaje_susses = response.data.mensaje;
                    setTimeout(() => location.href = me.url.cancel, 2000);
                }).catch(function (error) {
                console.log(error);
                me.errors = error.response.data.errors;
            });
        },

        moveTo () {
            let to = this.moveToDown
                ? this.$refs.description.offsetTop - 60
                : 0

            window.scroll({
                top: to,
                left: 0,
                behavior: 'smooth'
            })

            this.moveToDown = !this.moveToDown
        },

        crear: function () {
            this.loaded = true;
            this.limpiar();
            let url = '/admin/crear_temporal';
            axios.post(url, {
                email: this.email,
            }).then(
                response => {
                    //console.log(response.data);
                    this.peticion = true;
                    if (response.data.status === 200) {
                        this.password = response.data.credencial;
                        this.loaded = false;
                        //location.href = "/admin/home";
                    } else {
                        this.loaded = false;
                        this.messageE = response.data.message;
                    }
                },
                error => {
                    //console.log(error.response.data);
                    this.loaded = false;
                    if (error.response.data.errors.email) {
                        this.errorsEmail = error.response.data.errors.email;
                        this.claseNombre = 'form-control is-invalid';
                    }
                }
            ).catch(error => {
            });
        },
        regargar: function () {
            if (this.peticion) {
                location.reload();
            }
        },
        limpiar: function () {
            this.errorsEmail = [];
        },
        obtener_productos: function () {
            console.log("asdfs")
            // if (this.almacen_select.id != "") {
            //     let url = '/obtener_productos/' + this.almacen_select.id;
            //     axios.get(url).then(response => {
            //         console.log(response.data)
            //         this.productos = response.data.productos
            //     });
            // }
        },

        onSearch_productos(search) {
            console.log(search);
            if (search.length > 0) {
                let url = '/getProductos';

                axios.post(url, {
                    searchProducto: search,
                    almacenId: this.almacen_select.id,
                }).then(
                    response => {
                        this.productos = response.data.productos

                    },
                    error => {

                    }
                ).catch(error => {
                });

            }
        },

        exist_element(elem) {
            let me = this;
            let resul = false;
            if (me.form.tipo_id === elem.id) {
                resul = true;
            }
            return resul;
        },


        class_exist_element(val) {
            let me = this;
            if (me.exist_element(val)) {
                return 'red-bg';
            } else {
                return 'lazur-bg';
            }
        },

        seleccionar_tipo(item) {
            let me = this;
            // me.form.tipo_id = item.id;
            me.tipo = item;
        },

        add_component() {
            let me = this;
            me.form.array_composicion.push({
                'farmaco_id': '',
                'farmaco': '',
                'farmaco_nombre': '',
                'cantidad': '',
                'unidad': '',
                'principio_activo': false,
            });
        },
        quitar_composicion(composicion) {
            let me = this;
            let index = me.form.array_composicion.indexOf(composicion);
            me.form.array_composicion.splice(index, 1);
        },
        set_nombre(composicion) {
            let me = this;
            setTimeout(() => {
                composicion.farmaco_id = composicion.farmaco.id;
                composicion.farmaco_nombre = composicion.farmaco.nombre;
            }, 800)
        },

    },

    components: {
        vSelect,
    },
};
</script>

