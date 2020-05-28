$(document).ready(function(){
	/*--------------Departamento---------------------------*/
	//-------------------exluir
	$(".excluirdpto").click(function(e){
    	e.preventDefault(); 
    	$("#excluirdpto").attr('data-nome', $(this).attr('data-nome'));		
	});
	$("#excluirdpto").click(function(e){
    	e.preventDefault(); 
    	
    	$(".excluirdpto").each(function(){
    		if($(this).attr('data-nome') == $("#excluirdpto").attr('data-nome')){
    			$(this).parentsUntil('.dpto').remove();
    		}
    	}); 
    	var nome=$(this).attr('data-nome');		
		$.post('./php/dpto.php',{
			Nome:nome
		},function(){			
			
		});
		$('#exampleModal1').modal('hide'); 

	});//Exportar excel
	$("#exceldpto").click(function(e){
    	e.preventDefault(); 
    	fnExcelReport('listadpto');
    		
	});
	//-----------------Alterar
	$(".alterardpto").click(function(e){
    	e.preventDefault(); 
    	$("#alerardpto").attr('data-nome', $(this).attr('data-nome'));	
    	$("#nomedptom").val($(this).attr('data-nome'));

	});
	$("#alerardpto").click(function(e){
    	e.preventDefault();
    	var nomea=$(this).attr('data-nome');    	
    	var nome =  $('#nomedptom').val();        
      
		$.post('./php/dpto.php',{
			Nome:nome,
			Nomea:nomea,
			
		},function(a){
			
			if(a=='1'){						
				$('.nomedptolista').each(function(){
					if($(this).attr('id') == nomea){
						$(this).text(nome);
						$(this).attr('id',nome);
					}			    
				});
				$('.alterardpto').each(function(){
					if($(this).attr('data-nome') == nomea){
						$(this).attr('data-nome',nome);
					}			    
				});
				$('.excluirdpto').each(function(){
					if($(this).attr('data-nome') == nomea){
						$(this).attr('data-nome',nome);
					}			    
				});
				$('#exampleModal2').modal('hide'); 
			}
			else{
				alert("Este nome de Departamento já existe");
			}			
		});    	
	});
	/*--------------FIM Departamento---------------------------*/
	/*---------------Fornecedor------------------------*/
//-------------------exluir
	$(".excluirmarca").click(function(e){
    	e.preventDefault(); 
    	$("#excluirmarca").attr('data-nome', $(this).attr('data-nome'));		
	});
	$("#excluirmarca").click(function(e){
    	e.preventDefault(); 
    	
    	$(".excluirmarca").each(function(){
    		if($(this).attr('data-nome') == $("#excluirmarca").attr('data-nome')){
    			$(this).parentsUntil('.marca').remove();
    		}
    	}); 
    	var nome=$(this).attr('data-nome');		
		$.post('./php/marca.php',{
			Nome:nome
		},function(){			
			
		});
		$('#ExcluindoMarca').modal('hide'); 

	});//Exportar excel
	$("#excelmarca").click(function(e){
    	e.preventDefault(); 
    	fnExcelReport('listamarca');
    		
	});
	//-----------------Alterar
	$(".alterarmarca").click(function(e){
    	e.preventDefault(); 
    	$("#alterarmarca").attr('data-nome', $(this).attr('data-nome'));	
    	$("#nomemarcam").val($(this).attr('data-nome'));

	});
	$("#alterarmarca").click(function(e){
    	e.preventDefault();
    	var nomea=$(this).attr('data-nome');    	
    	var nome =  $('#nomemarcam').val();        
      
		$.post('./php/marca.php',{
			Nome:nome,
			Nomea:nomea,
			
		},function(a){
			
			if(a=='1'){						
				$('.nomemarcalista').each(function(){
					if($(this).attr('id') == nomea){
						$(this).text(nome);
						$(this).attr('id',nome);
					}			    
				});
				$('.alterarmarca').each(function(){
					if($(this).attr('data-nome') == nomea){
						$(this).attr('data-nome',nome);
					}			    
				});
				$('.excluirmarca').each(function(){
					if($(this).attr('data-nome') == nomea){
						$(this).attr('data-nome',nome);
					}			    
				});
				$('#ModificarMarca').modal('hide'); 
			}
			else{
				alert("Este nome de Departamento já existe");
			}			
		});    	
	});

	/*---------------FIM Fornecedor------------------------*/
	/*---------------RAM------------------------*/
//-------------------exluir
	$(".excluirram").click(function(e){
    	e.preventDefault(); 
    	$("#excluirram").attr('data-tipo', $(this).attr('data-id1'));	
    	$("#excluirram").attr('data-cap', $(this).attr('data-id2'));	
	});
	$("#excluirram").click(function(e){
    	e.preventDefault(); 
    	
    	$(".excluirram").each(function(){
    		if($(this).attr('data-id1') == $("#excluirram").attr('data-tipo') && $(this).attr('data-id2') == $("#excluirram").attr('data-cap')){
    			$(this).parentsUntil('.ram').remove();
    		}
    	}); 
    	var tipo=$(this).attr('data-tipo');	
    	var cap=$(this).attr('data-cap');		
		$.post('./php/ram.php',{
			Tipo:tipo,
			Cap:cap
		},function(){			
			
		});
		$('#ExcluirRam').modal('hide'); 

	});//Exportar excel
	$("#excelram").click(function(e){
    	e.preventDefault(); 
    	fnExcelReport('listaram');
    		
	});
	

	/*---------------FIM RAM------------------------*/
	/*---------------HDD------------------------*/
//-------------------exluir
	$(".excluirhd").click(function(e){
    	e.preventDefault(); 
    	$("#excluirhd").attr('data-marca', $(this).attr('data-id1'));	
    	$("#excluirhd").attr('data-cap', $(this).attr('data-id2'));	
	});
	$("#excluirhd").click(function(e){
    	e.preventDefault(); 
    	
    	$(".excluirhd").each(function(){
    		if($(this).attr('data-id1') == $("#excluirhd").attr('data-marca') && $(this).attr('data-id2') == $("#excluirhd").attr('data-cap')){
    			$(this).parentsUntil('.hd').remove();
    		}
    	}); 
    	var marca=$(this).attr('data-marca');	
    	var cap=$(this).attr('data-cap');		
		$.post('./php/hd.php',{
			Marca:marca,
			Cap:cap
		},function(){			
			
		});
		$('#ExcluirHd').modal('hide'); 

	});//Exportar excel
	$("#excelhd").click(function(e){
    	e.preventDefault(); 
    	fnExcelReport('listahd');
    		
	});
	
	/*---------------FIM HDD------------------------*/
	/*---------------Microprocessador------------------------*/
//-------------------exluir
	$(".excluirmicro").click(function(e){
    	e.preventDefault(); 
    	$("#excluirmicro").attr('data-tipo', $(this).attr('data-id1'));	
    	
	});
	$("#excluirmicro").click(function(e){
    	e.preventDefault(); 
    	
    	$(".excluirmicro").each(function(){
    		if($(this).attr('data-id1') == $("#excluirmicro").attr('data-tipo')){
    			$(this).parentsUntil('.micro').remove();
    		}
    	}); 
    	var tipo=$(this).attr('data-tipo');	
    		
		$.post('./php/micro.php',{
			Tipo:tipo
		},function(){			
			
		});
		$('#ExcluirHd').modal('hide'); 

	});//Exportar excel
	$("#excelmicro").click(function(e){
    	e.preventDefault(); 
    	fnExcelReport('listamicro');
    		
	});
	

	/*---------------FIM Microprocessador------------------------*/
	/*---------------Monitor------------------------*/
//-------------------exluir
	$(".excluirmonitor").click(function(e){
    	e.preventDefault(); 
    	$("#excluirmonitor").attr('data-id', $(this).attr('data-id'));	
    	
	});
	$("#excluirmonitor").click(function(e){
    	e.preventDefault(); 
    	
    	$(".excluirmonitor").each(function(){
    		if($(this).attr('data-id') == $("#excluirmonitor").attr('data-id')){
    			$(this).parentsUntil('.monitor').remove();
    		}
    	}); 
    	var tipo=$(this).attr('data-id');	
    		
		$.post('./php/monitor.php',{
			Id:tipo
		},function(){			
			
		});
		$('#ExcluindoMonitor').modal('hide'); 

	});//Exportar excel
	$("#excelmonitor").click(function(e){
    	e.preventDefault(); 
    	fnExcelReport('listamonitor');
    		
	});//Alterar-----------------------------
	$(".altermonitor").click(function(e){
    	e.preventDefault(); 
    	$("#alterarmonitor").attr('data-id', $(this).attr('data-id'));	
    	$("#idmonitorm").val($(this).attr('data-id'));
    	$("#dptomonitorm").val($(this).attr('data-dpto'));
    	$("#marcamonitorm").val($(this).attr('data-marca'));
    	$("#estadomonitorm").val($(this).attr('data-estado'));

	});
	$("#alterarmonitor").click(function(e){
    	e.preventDefault();
    	var ida=$(this).attr('data-id');    	
    	var id = $("#idmonitorm").val();
    	var dpto = $("#dptomonitorm").val();
    	var marca = $("#marcamonitorm").val();
    	var estado = $("#estadomonitorm").val();

      
		$.post('./php/monitor.php',{
			Ida:ida,
			Id:id,
			Marca:marca,
			Dpto:dpto,
			Estado:estado			
		},function(a){
			
			if(a=='1'){						
				$('.idmonitor').each(function(){
					if($(this).attr('id') == ida){
						$(this).attr('id', id)
						$(this).text(id);						
					}			    
				});
				$('.marcamonitor').each(function(){
					if($(this).attr('id') == ida){
						$(this).attr('id', id)
						$(this).text(marca);						
					}			    
				});
				$('.dptomonitor').each(function(){
					if($(this).attr('id') == ida){
						$(this).attr('id', id)
						$(this).text(dpto);						
					}			    
				});
				$('.estadomonitor').each(function(){
					if($(this).attr('id') == ida){
						$(this).attr('id', id)
						$(this).text(estado);						
					}			    
				});
				$('.altermonitor').each(function(){
					if($(this).attr('data-id') == ida){
						$(this).attr('data-id',id);
						$(this).attr('data-marca',marca);
						$(this).attr('data-dpto',dpto);
						$(this).attr('data-estado',estado);
					}			    
				});
				$('.excluirmonitor').each(function(){
					if($(this).attr('data-id') == ida){
						$(this).attr('data-id',id);
					}			    
				});
				$('#ModificarMonitor').modal('hide'); 
			}
			else{
				alert("Este Id já existe");
			}			
		});    	
	});
	

	/*---------------FIM Monitor------------------------*/
	/*---------------Computador------------------------*/
//-------------------exluir
	$(".excluircomp").click(function(e){
    	e.preventDefault(); 
    	$("#excluircomp").attr('data-id', $(this).attr('data-id'));	
    	
	});
	$("#excluircomp").click(function(e){
    	e.preventDefault(); 
    	
    	$(".excluircomp").each(function(){
    		if($(this).attr('data-id') == $("#excluircomp").attr('data-id')){
    			$(this).parentsUntil('.computador').remove();
    		}
    	}); 
    	var id=$(this).attr('data-id');	
    		
		$.post('./php/computador.php',{
			Id:id
		},function(){			
			
		});
		$('#ExcluindoComp').modal('hide'); 

	});//Exportar excel
	$("#excelcomp").click(function(e){
    	e.preventDefault(); 
    	fnExcelReport('listacomp');
    		
	});//Alterar-----------------------------
	$(".altercomp").click(function(e){
    	e.preventDefault(); 
    	$("#alterarcomp").attr('data-id', $(this).attr('data-id'));	
    	$("#idcompm").val($(this).attr('data-id'));
    	$("#dptocompm").val($(this).attr('data-dpto'));
    	$("#marcacompm").val($(this).attr('data-marca'));
    	$("#estadocompm").val($(this).attr('data-estado'));
    	$("#capacidadehdm").val($(this).attr('data-hd'));
    	$("#capacidaderamm").val($(this).attr('data-ram'));
    	$("#tipom").val($(this).attr('data-tipo'));
    	$("#microm").val($(this).attr('data-micro'));

	});
	$("#alterarcomp").click(function(e){
    	e.preventDefault();
    	var ida=$(this).attr('data-id');    	
    	var id = $("#idcompm").val();
    	var dpto = $("#dptocompm").val();
    	var marca = $("#marcacompm").val();
    	var estado = $("#estadocompm").val();
    	var ram = $("#capacidaderamm").val();
    	var hd = $("#capacidadehdm").val();
    	var tipo = $("#tipom").val();
    	var micro = $("#microm").val();


      
		$.post('./php/computador.php',{
			Ida:ida,
			Id:id,
			Marca:marca,
			Dpto:dpto,
			Estado:estado,
			Tipo:tipo,
			Micro:micro,
			Hd:hd,
			Ram:ram			
		},function(a){
			
			if(a=='1'){						
				$('.idcomp').each(function(){
					if($(this).attr('id') == ida){
						$(this).attr('id', id)
						$(this).text(id);						
					}			    
				});
				$('.marcacomp').each(function(){
					if($(this).attr('id') == ida){
						$(this).attr('id', id)
						$(this).text(marca);						
					}			    
				});
				$('.dptocomp').each(function(){
					if($(this).attr('id') == ida){
						$(this).attr('id', id)
						$(this).text(dpto);						
					}			    
				});
				$('.estadcomp').each(function(){
					if($(this).attr('id') == ida){
						$(this).attr('id', id)
						$(this).text(estado);						
					}			    
				});
				$('.microcomp').each(function(){
					if($(this).attr('id') == ida){
						$(this).attr('id', id)
						$(this).text(micro);						
					}			    
				});
				$('.tipocomp').each(function(){
					if($(this).attr('id') == ida){
						$(this).attr('id', id)
						$(this).text(tipo);						
					}			    
				});
				$('.hdcomp').each(function(){
					if($(this).attr('id') == ida){
						$(this).attr('id', id)
						$(this).text(hd);						
					}			    
				});
				$('.ramcomp').each(function(){
					if($(this).attr('id') == ida){
						$(this).attr('id', id)
						$(this).text(ram);						
					}			    
				});
				$('.altercomp').each(function(){
					if($(this).attr('data-id') == ida){
						$(this).attr('data-id',id);
						$(this).attr('data-marca',marca);
						$(this).attr('data-dpto',dpto);
						$(this).attr('data-estado',estado);
						$(this).attr('data-tipo',tipo);
						$(this).attr('data-micro',micro);
						$(this).attr('data-hd',hd);
						$(this).attr('data-ram',ram);
					}			    
				});
				$('.excluircomp').each(function(){
					if($(this).attr('data-id') == ida){
						$(this).attr('data-id',id);
					}			    
				});
				$('#ModificarComp').modal('hide'); 
			}
			else{
				alert("Este Id já existe");
			}			
		});    	
	});
	

	/*---------------FIM Computador------------------------*/
/*---------------Projector------------------------*/
//-------------------exluir
	$(".excluirpro").click(function(e){
    	e.preventDefault(); 
    	$("#excluirpro").attr('data-id', $(this).attr('data-id'));	
    	
	});
	$("#excluirpro").click(function(e){
    	e.preventDefault(); 
    	
    	$(".excluirpro").each(function(){
    		if($(this).attr('data-id') == $("#excluirpro").attr('data-id')){
    			$(this).parentsUntil('.pro').remove();
    		}
    	}); 
    	var tipo=$(this).attr('data-id');	
    		
		$.post('./php/projector.php',{
			Id:tipo
		},function(){			
			
		});
		$('#ExcluindoPro').modal('hide'); 

	});//Exportar excel
	$("#excelpro").click(function(e){
    	e.preventDefault(); 
    	fnExcelReport('listapro');
    		
	});//Alterar-----------------------------
	$(".alterpro").click(function(e){
    	e.preventDefault(); 
    	$("#alterarpro").attr('data-id', $(this).attr('data-id'));	
    	$("#idpro").val($(this).attr('data-id'));
    	$("#dptopro").val($(this).attr('data-dpto'));
    	$("#marcapro").val($(this).attr('data-marca'));
    	$("#estadopro").val($(this).attr('data-estado'));

	});
	$("#alterarpro").click(function(e){
    	e.preventDefault();
    	var ida=$(this).attr('data-id');    	
    	var id = $("#idpro").val();
    	var dpto = $("#dptopro").val();
    	var marca = $("#marcapro").val();
    	var estado = $("#estadopro").val();

      
		$.post('./php/projector.php',{
			Ida:ida,
			Id:id,
			Marca:marca,
			Dpto:dpto,
			Estado:estado			
		},function(a){
			
			if(a=='1'){						
				$('.idpro').each(function(){
					if($(this).attr('id') == ida){
						$(this).attr('id', id)
						$(this).text(id);						
					}			    
				});
				$('.marcapro').each(function(){
					if($(this).attr('id') == ida){
						$(this).attr('id', id)
						$(this).text(marca);						
					}			    
				});
				$('.dptopro').each(function(){
					if($(this).attr('id') == ida){
						$(this).attr('id', id)
						$(this).text(dpto);						
					}			    
				});
				$('.estadopro').each(function(){
					if($(this).attr('id') == ida){
						$(this).attr('id', id)
						$(this).text(estado);						
					}			    
				});
				$('.alterpro').each(function(){
					if($(this).attr('data-id') == ida){
						$(this).attr('data-id',id);
						$(this).attr('data-marca',marca);
						$(this).attr('data-dpto',dpto);
						$(this).attr('data-estado',estado);
					}			    
				});
				$('.excluirpro').each(function(){
					if($(this).attr('data-id') == ida){
						$(this).attr('data-id',id);
					}			    
				});
				$('#ModificarPro').modal('hide'); 
			}
			else{
				alert("Este Id já existe");
			}			
		});    	
	});
	/*---------------FIM Projector------------------------*/
	/*---------------Impressora------------------------*/
//-------------------exluir
	$(".excluirimp").click(function(e){
    	e.preventDefault(); 
    	$("#excluirimp").attr('data-id', $(this).attr('data-id'));	
    	
	});
	$("#excluirimp").click(function(e){
    	e.preventDefault(); 
    	
    	$(".excluirimp").each(function(){
    		if($(this).attr('data-id') == $("#excluirimp").attr('data-id')){
    			$(this).parentsUntil('.imp').remove();
    		}
    	}); 
    	var tipo=$(this).attr('data-id');	
    		
		$.post('./php/impressora.php',{
			Id:tipo
		},function(){			
			
		});
		$('#ExcluindoImp').modal('hide'); 

	});//Exportar excel
	$("#excelimp").click(function(e){
    	e.preventDefault(); 
    	fnExcelReport('listaimp');
    		
	});//Alterar-----------------------------
	$(".alterimp").click(function(e){
    	e.preventDefault(); 
    	$("#alterarimp").attr('data-id', $(this).attr('data-id'));	
    	$("#idimp").val($(this).attr('data-id'));
    	$("#dptoimp").val($(this).attr('data-dpto'));
    	$("#marcaimp").val($(this).attr('data-marca'));
    	$("#estadoimp").val($(this).attr('data-estado'));

	});
	$("#alterarimp").click(function(e){
    	e.preventDefault();
    	var ida=$(this).attr('data-id');    	
    	var id = $("#idimp").val();
    	var dpto = $("#dptoimp").val();
    	var marca = $("#marcaimp").val();
    	var estado = $("#estadoimp").val();

      
		$.post('./php/impressora.php',{
			Ida:ida,
			Id:id,
			Marca:marca,
			Dpto:dpto,
			Estado:estado			
		},function(a){
			
			if(a=='1'){						
				$('.idimp').each(function(){
					if($(this).attr('id') == ida){
						$(this).attr('id', id)
						$(this).text(id);						
					}			    
				});
				$('.marcaimp').each(function(){
					if($(this).attr('id') == ida){
						$(this).attr('id', id)
						$(this).text(marca);						
					}			    
				});
				$('.dptoimp').each(function(){
					if($(this).attr('id') == ida){
						$(this).attr('id', id)
						$(this).text(dpto);						
					}			    
				});
				$('.estadoimp').each(function(){
					if($(this).attr('id') == ida){
						$(this).attr('id', id)
						$(this).text(estado);						
					}			    
				});
				$('.alterimp').each(function(){
					if($(this).attr('data-id') == ida){
						$(this).attr('data-id',id);
						$(this).attr('data-marca',marca);
						$(this).attr('data-dpto',dpto);
						$(this).attr('data-estado',estado);
					}			    
				});
				$('.excluirimp').each(function(){
					if($(this).attr('data-id') == ida){
						$(this).attr('data-id',id);
					}			    
				});
				$('#ModificarImp').modal('hide'); 
			}
			else{
				alert("Este Id já existe");
			}			
		});    	
	});
	/*---------------FIM Impresora------------------------*/
	/*---------------Rato------------------------*/
//-------------------exluir
	$(".excluirrato").click(function(e){
    	e.preventDefault(); 
    	$("#excluirrato").attr('data-id', $(this).attr('data-id'));	
    	
	});
	$("#excluirrato").click(function(e){
    	e.preventDefault(); 
    	
    	$(".excluirrato").each(function(){
    		if($(this).attr('data-id') == $("#excluirrato").attr('data-id')){
    			$(this).parentsUntil('.rato').remove();
    		}
    	}); 
    	var tipo=$(this).attr('data-id');	
    		
		$.post('./php/rato.php',{
			Id:tipo
		},function(){			
			
		});
		$('#ExcluindoRato').modal('hide'); 

	});//Exportar excel
	$("#excelrato").click(function(e){
    	e.preventDefault(); 
    	fnExcelReport('listarato');
    		
	});//Alterar-----------------------------
	$(".alterrato").click(function(e){
    	e.preventDefault(); 
    	$("#alterarrato").attr('data-id', $(this).attr('data-id'));	
    	$("#idrato").val($(this).attr('data-id'));
    	$("#dptorato").val($(this).attr('data-dpto'));
    	$("#marcarato").val($(this).attr('data-marca'));
    	$("#estadorato").val($(this).attr('data-estado'));

	});
	$("#alterarrato").click(function(e){
    	e.preventDefault();
    	var ida=$(this).attr('data-id');    	
    	var id = $("#idrato").val();
    	var dpto = $("#dptorato").val();
    	var marca = $("#marcarato").val();
    	var estado = $("#estadorato").val();

      
		$.post('./php/rato.php',{
			Ida:ida,
			Id:id,
			Marca:marca,
			Dpto:dpto,
			Estado:estado			
		},function(a){
			
			if(a=='1'){						
				$('.idrato').each(function(){
					if($(this).attr('id') == ida){
						$(this).attr('id', id)
						$(this).text(id);						
					}			    
				});
				$('.marcarato').each(function(){
					if($(this).attr('id') == ida){
						$(this).attr('id', id)
						$(this).text(marca);						
					}			    
				});
				$('.dptorato').each(function(){
					if($(this).attr('id') == ida){
						$(this).attr('id', id)
						$(this).text(dpto);						
					}			    
				});
				$('.estadorato').each(function(){
					if($(this).attr('id') == ida){
						$(this).attr('id', id)
						$(this).text(estado);						
					}			    
				});
				$('.alterrato').each(function(){
					if($(this).attr('data-id') == ida){
						$(this).attr('data-id',id);
						$(this).attr('data-marca',marca);
						$(this).attr('data-dpto',dpto);
						$(this).attr('data-estado',estado);
					}			    
				});
				$('.excluirrato').each(function(){
					if($(this).attr('data-id') == ida){
						$(this).attr('data-id',id);
					}			    
				});
				$('#ModificarRato').modal('hide'); 
			}
			else{
				alert("Este Id já existe");
			}			
		});    	
	});
	/*---------------FIM Rato------------------------*/
	/*---------------Teclado------------------------*/
//-------------------exluir
	$(".excluirtec").click(function(e){
    	e.preventDefault(); 
    	$("#excluirtec").attr('data-id', $(this).attr('data-id'));	
    	
	});
	$("#excluirtec").click(function(e){
    	e.preventDefault(); 
    	
    	$(".excluirtec").each(function(){
    		if($(this).attr('data-id') == $("#excluirtec").attr('data-id')){
    			$(this).parentsUntil('.tec').remove();
    		}
    	}); 
    	var tipo=$(this).attr('data-id');	
    		
		$.post('./php/teclado.php',{
			Id:tipo
		},function(){			
			
		});
		$('#Excluindotec').modal('hide'); 

	});//Exportar excel
	$("#exceltec").click(function(e){
    	e.preventDefault(); 
    	fnExcelReport('listatec');
    		
	});//Alterar-----------------------------
	$(".altertec").click(function(e){
    	e.preventDefault(); 
    	$("#alterartec").attr('data-id', $(this).attr('data-id'));	
    	$("#idtec").val($(this).attr('data-id'));
    	$("#dptotec").val($(this).attr('data-dpto'));
    	$("#marcatec").val($(this).attr('data-marca'));
    	$("#estadotec").val($(this).attr('data-estado'));

	});
	$("#alterartec").click(function(e){
    	e.preventDefault();
    	var ida=$(this).attr('data-id');    	
    	var id = $("#idtec").val();
    	var dpto = $("#dptotec").val();
    	var marca = $("#marcatec").val();
    	var estado = $("#estadotec").val();

      
		$.post('./php/teclado.php',{
			Ida:ida,
			Id:id,
			Marca:marca,
			Dpto:dpto,
			Estado:estado			
		},function(a){
			
			if(a=='1'){						
				$('.idtec').each(function(){
					if($(this).attr('id') == ida){
						$(this).attr('id', id)
						$(this).text(id);						
					}			    
				});
				$('.marcatec').each(function(){
					if($(this).attr('id') == ida){
						$(this).attr('id', id)
						$(this).text(marca);						
					}			    
				});
				$('.dptotec').each(function(){
					if($(this).attr('id') == ida){
						$(this).attr('id', id)
						$(this).text(dpto);						
					}			    
				});
				$('.estadotec').each(function(){
					if($(this).attr('id') == ida){
						$(this).attr('id', id)
						$(this).text(estado);						
					}			    
				});
				$('.altertec').each(function(){
					if($(this).attr('data-id') == ida){
						$(this).attr('data-id',id);
						$(this).attr('data-marca',marca);
						$(this).attr('data-dpto',dpto);
						$(this).attr('data-estado',estado);
					}			    
				});
				$('.excluirtec').each(function(){
					if($(this).attr('data-id') == ida){
						$(this).attr('data-id',id);
					}			    
				});
				$('#Modificartec').modal('hide'); 
			}
			else{
				alert("Este Id já existe");
			}			
		});    	
	});
	/*---------------FIM Teclado------------------------*/
	$("#excelrelatorio").click(function(e){//Excel relatorio # 1
    	e.preventDefault(); 
    	fnExcelReport('listarelatorio');
    		
	});
	//-----------------------------------------User---------------------------------------------------
	$("#entraruser").click(function(e){
    	e.preventDefault();    	
		if($('#userid').val().length == 0 || $('#senha').val().length == 0){
			alert("Usuário ou senha não válidos!!!");
		}
		else{			
			
			$.post('./php/user.php',{
					User:$('#userid').val(),
					Senha:$('#senha').val()
				},function(a){
					if(a=='1'){
						location.href="./principal.php";
					}
					else{
						alert("Usuário ou senha não válidos!!!");						
					}
			});		
		}
	});
	$(".fecharsessao").click(function(e){
    	e.preventDefault();
    	$.post('./php/fecharsessao.php',{

		},function(){
			location.href="./index.php";					
		});
	});
	$("#trocarsenha").click(function(e){
    	e.preventDefault();
    	
    	
    	var senhaAnterior = $('#senhaanterior').val();
    	var novaSenha = $('#novasenha').val();
    	var repnovaSenha = $('#rnovasenha').val();  

    	if($('#novasenha').val().length < 6){    		
    		 alert("A nova senha deve ter mais de 5 caracteres!!!");
    	}
    	else{
    		if(novaSenha == repnovaSenha){
		    	$.post('./php/trocar_senha.php',{
		    		Senha:novaSenha,
		    		Senhaa:senhaAnterior
				},function(a){
					if(a=="1"){						
						alert("Senha trocada com sucesso.");
					}
					else{
						alert("Não se realizou a ação, comprove que sua senha anterior é correta.");
					}
										
				});
    		}
    		else{
    			alert("As senhas novas não coincidem.");
    		}
    	}

    	
	});
	//----------------------FIM User------------------------------------------------

/*----------------Funções necessárias--------------------------------------------------------------------------------*/
	/*--- Para exportar a excel-----*/
function fnExcelReport(chave)
{
    var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
    var textRange; var j=0;
    tab = document.getElementById(chave); // id of table

    for(j = 0 ; j < tab.rows.length ; j++) 
    {     
        tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
        //tab_text=tab_text+"</tr>";
    }

    tab_text=tab_text+"</table>";
    tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
    tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE "); 

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
    {
        txtArea1.document.open("txt/html","replace");
        txtArea1.document.write(tab_text);
        txtArea1.document.close();
        txtArea1.focus(); 
        sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Sumit.xls");
    }  
    else                 //other browser not tested on IE 11
        sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

    return (sa);
}
});