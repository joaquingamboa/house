<?php
	echo '<div id="menu">
                        <ul>
							<li class="nivel1 primera" tabindex="1"><a href="formularioventa.php">Inicio</a>
							
							</li>
                        	<li class="nivel1" tabindex="2"><span class="nivel1">Clientes</span>
                                <ul>

                                    <li><a href="ingresarcliente.php">Ingresar Cliente</a></li>
									<li class="primera"><a href="buscarcliente.php">Buscar Cliente</a></li>
                                </ul>
								
                            </li>
							
                        	<li class="nivel1" tabindex="3"><span class="nivel1">Productos</span>
                                <ul>
                                	<li class="primera"><a href="buscarproducto.php">Buscar Producto</a></li>

                                </ul>
                            </li>

                        	<li class="nivel1" tabindex="4"><span class="nivel1">Orden De Compra</span>
                                <ul>
                                	<li class="primera"><a href="ingresarordendecompra.php">Ingresar Orden De Compra</a></li>
                                    <li><a href="mostrardetalleordencompra.php">Mostrar Detalle OC</a></li>
								<li class="primera"><a href="controlordendecompra.php">Control Orden De Compra</a></li>
                                </ul>
                            </li>
							<li class="nivel1" tabindex="4"><span class="nivel1">Logout</span>
                            </li>
                        </ul>
                </div>';
?>