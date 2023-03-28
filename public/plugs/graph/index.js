
 var flowFun = {
 
  // var fixedNodeId = {
    // begin: 'begin-node',
    // end: 'end-node'
  // }

  // 放入拖动节点
  dropNode:function (template, position) {

	var areaId = '#drop-bg';
		if (template === 'tpl-WorkTime') {
			position.name = '跳转节点';
		}
		if (template === 'tpl-Menu') {
			position.name = '流程节点';
			position.content = '内容';
		}

		//console.log($('#side-buttons').outerWidth());
    //position.left -= $('#side-buttons').outerWidth()
    position.type = "new";
    position.id = uuid.v1()
    position.generateId = uuid.v1
    var html = this.renderHtml(template, position)
    
    $(areaId).append(html);

    this.initSetNode(template, position.id);
		
		var temp = {};
		temp.key = position.id; 
		temp.id = ""; 
		if (template === 'tpl-WorkTime') {
			temp.type = "WorkTime"; 
			temp.name = "跳转节点"; 
		}
		else if(template === 'tpl-Menu'){
			temp.type = "Menu";
			temp.name = "流程节点"; 
			temp.content = position.content; 
			temp.thumb = []; 
		}

		temp.isDelete = 0; 
		temp.pid = 0; 
		temp.pNode = null; 
		temp.top = position.top; 
		temp.left = position.left; 
		NodeList.push(temp);

  },

  // 初始化节点设置
  initSetNode:function (template, id) {

    this.addDraggable(id)

    if (template === 'tpl-audio') {
      this.setEnterPoint(id)
      this.setExitPoint(id)
    } else if (template === 'tpl-menu') {
      this.setEnterPoint(id + '-heading')
      this.setExitMenuItem(id)
    }else if (template === 'tpl-WorkTime') {
      this.setEnterPoint(id + '-heading')
     // this.setExitMenuItem(id)  //跳转节点  不设置子节点
    }else if (template === 'tpl-Menu') {
			this.setEnterPoint(id + '-heading')
			this.setExitLiItem(id)
		}
  },

  // 设置入口点
  setEnterPoint:function  (id) {

    var config = this.getBaseNodeConfig()

    config.isSource = false
    config.maxConnections = -1

    jsPlumb.addEndpoint(id, {
      anchors: 'Top',
      uuid: id + '-in'
    }, config)
  },

  // 设置出口点
  setExitPoint:function  (id, position) {
 
    var config = this.getBaseNodeConfig()

    config.isTarget = false
    config.maxConnections = 1
   // console.log(position);
    jsPlumb.addEndpoint(id, {
      anchors: position || 'Bottom',
      uuid: id + '-out'
    }, config)
  },

  setExitMenuItem:function  (id) {
  
    $('#' + id).find('li').each(function (key, value) {
		//	console.log(value.id);
      flowFun.setExitPoint(value.id, 'Right')
    })
  },
	
	setExitLiItem:function  (id) {
	
		$('#' + id).find('.actionli').each(function (key, value) {
			//console.log(key);
			flowFun.setExitPoint(value.id, 'Bottom')
		})
	},

  // 删除一个节点以及
  emptyNode:function  (id) {
  	
	$("#isHaveChange").val(1);  //改变了数据，跳转时做判断用，提示是否保存
		
    jsPlumb.remove(id)
  },

  // 让元素可拖动
  addDraggable:function  (id) {
    jsPlumb.draggable(id, {
		containment: 'parent',
		drag: function (event, ui) {
			
			var position = ui.position;
			var top = position.top;
			var left = position.left;
			var rowwidth = 853,rowheight = 668;  //外面row的高宽
			var dbwidth = 833,dbheight = 554;
			
			var nowheight = $("#drop-bg").css("height");
			var nowwidth = $("#drop-bg").css("width");
			
				
			if(!nowwidth){
				nowwidth = dbwidth;
			}
			else{
				var ws = new Array();
				ws = nowwidth.split("px");

				if(isNaN(ws[0])){
					nowwidth = dbwidth;
				}else{
				
					nowwidth = ws[0];
				}
				
			}
			
			if(left == 0){
				
				var nowId = ui.helper.context.id;
					
				var setw = Number(nowwidth) + 100;
				$("#drop-bg").css("width",setw+"px");
				/*
				$("#side-buttons").css("width",setw+"px");
				*/
				var lasting = NodeList.length;
				for (var i=0;i<lasting;i++) {
					if(NodeList[i].key != nowId){
						
						//NodeList[i].top = position.top;
						NodeList[i].left = Number(NodeList[i].left) + 100;
						
						flowFun.emptyNode(NodeList[i].key);
						
						flowFun.getOne(NodeList[i].key,NodeList[i].id, NodeList[i].left);
								
									
								
					}
					
					
				}
				
		
			
			}

			
			if(top || left){
				
					
					if(!nowheight){
						nowheight = dbheight;
					}
					else{
						var hs = new Array();
						hs = nowheight.split("px");
						nowheight = hs[0];
					}
					
					var preh = nowheight - 140;//用来比较的画布现在高度；
				

					if(top > preh){
						var set = Number(nowheight) + 100;
						$("#drop-bg").css("height",set+"px");
					}
					
					var prew = nowwidth - 50 - 286;//用来比较的画布现在高度；
					
					
					if(left > prew){
						var setw = Number(nowwidth) + 100;
						$("#drop-bg").css("width",setw+"px");
						// $("#side-buttons").css("width",setw+"px");
						
						//var pst = $("#fullScreen").css("position");
		
				
					}
									
			}
	
		},
				
		stop: function (event, ui){
			
		    $("#isHaveChange").val(1);  //改变了数据，跳转时做判断用，提示是否保存
		    
			var nowId = ui.helper.context.id;
			var position = ui.position;
			
			var lasting = NodeList.length;
			for (var i=0;i<lasting;i++) {
				if(NodeList[i].key == nowId){
					NodeList[i].top = position.top;
					NodeList[i].left = position.left;
				}
			}
				
		}
    })
  },
  
   //刷新单个节点
	getOne: function (nowEditKey,nodeId,nodeleft){
	 	
	 
		 var sceneId = $("#nowsceneID").val();
		 var nowProcessId = $("#nowProcessId").val();
	
		$.ajax({
			url : backSingleurl,
			type : "post",
			data : {
				'sceneId':sceneId,
				'nowProcessId':nowProcessId,
				'nodeId':nodeId,
			},
			success: function(data){	

				if(data.code == 1){
					 alert(data.msg);
				}else{
					
					
					var node = nowEditKey;
				   	
					flowFun.emptyNode(node);
					//jsPlumb.empty(node);
					
					var item = data.data;
					var data = {
						id: "node-"+item.id,
						name: item.name,
						content: item.content,
						top: item.top,
						left: nodeleft,
						type: "old",
						key: item.id,
						nextName:item.next_name,
						choices: item.data.choices || []
					}
	
					var template = DataDraw.getTemplate(item)
	
					$('#drop-bg').append(Mustache.render(template, data));
					
					 DataDraw['addEndpointOf' + item.type](item);
					 DataDraw['connectEndpointOf' + item.type](item);
					 
				
			         //如果有父节点,重新连接父节点
			         if(item.pid > 0){
			         	cont(item.pid,nodeId);
			         }
     
				}
		
			},
			error : function() {
					alert(data.msg);
			}
		});

	 },

  // 渲染html
  renderHtml:function  (type, position) {
  	
    return Mustache.render($('#' + type).html(), position)
		
  },

  //删除节点
  eventHandler:function  (data) {
 
    if (data.type === 'deleteNode') {
    	
			$("#isHaveChange").val(1);  //改变了数据，跳转时做判断用，提示是否保存
			
			this.emptyNode(data.id)
				//console.log(NodeList);
			var lasting = NodeList.length;
			for (var i=0;i<lasting;i++) {
 				if(NodeList[i].key == data.id && NodeList[i].id){
 					NodeList[i].isDelete = 1; 
					//去把父节点下面对应的分支点清理掉，让它指向为空。
					if(NodeList[i].pid > 0){
						
						for (var j=0;j<lasting;j++) {
							
							if(NodeList[j].id == NodeList[i].pid){
								 var thumb = NodeList[j].thumb;
								 var long = thumb.length;
								 for(var k = 0; k < long; k++){
									// console.log(thumb[k]["nextNodeId"]);
									// console.log("<br/>");
									 
									 var nelist = new Array();
									 nelist = data.id.split("-");
									// console.log(nelist[1]);
								 	if(thumb[k]["nextNodeId"] == nelist[1]){
								 		NodeList[j].thumb[k]["nextNodeId"] = null;
										NodeList[j].thumb[k]["nextNode"] = null;
								 	}
								 }
							}
							
						}

					}
					
					break;
 				}else{
					//console.log(NodeList[i].key);  
					if(!NodeList[i].id){
						NodeList.splice(i,1);
            break;
					}
				
				}
			}

    }
  },

  // 主要入口   , 建立连接的
  main:function  (url,scen_node_id) {

    // 让退出节点可拖动
    // addDraggable(fixedNodeId.end)
    // initBeginNode()
    // initEndNode()

    // DataProcess.inputData(data.nodeList)
	   	$("#drop-bg").removeAttr("style");
	   	//$("#side-buttons").css("width","auto");
	    $("#myTab").css({
		'width': "auto",
	//	'margin-left': " 14.6%",
		});
	    
		$.ajax({
			url : url,
			dataType : "json", 
			type : "post",
			data : {'sceneId':scen_node_id},
			success: function(res){
				
				
                flowFun.emptyCanvas();
				// jsPlumb.detachEveryConnection();
				DataDraw.draw(res.data);  //显示数据
				 
				 //搭建数据结构
				dataStructure(res.data);


				res.data.forEach(function (item, key) {
				 
				var top = item.top;
				var left = item.left;
				var rowwidth = 853,rowheight = 668;  //外面row的高宽
				var dbwidth = 853,dbheight = 554;

				var nowheight = $("#drop-bg").css("height");
				var nowwidth = $("#drop-bg").css("width");

				if(top || left){
						
						if(!nowwidth){
							nowwidth = dbwidth;
						}
						else{
							var ws = new Array();
							ws = nowwidth.split("px");

							if(isNaN(ws[0])){
								nowwidth = dbwidth;
							}else{
							
								nowwidth = ws[0];
							}
							
						}
						
						if(!nowheight){
							nowheight = dbheight;
						}
						else{
							var hs = new Array();
							hs = nowheight.split("px");
							nowheight = hs[0];
						}
						
						var preh = nowheight - 200;
					
						if(Number(top) > Number(preh)){
							var set = Number(top) + 250;
							$("#drop-bg").css("height",set+"px");
						}
						
						var prew = nowwidth - 286;

						if(Number(left) > Number(prew)){
							var setw = Number(left) + 350;
							$("#drop-bg").css("width",setw+"px");
							//$("#side-buttons").css("width",setw+"px");
							var pst = $("#fullScreen").css("position");
							
						}
					}					
				})

			},
			error : function() {
				//alert('获取页面列表失败。');
			}
		});
		
		
    // DataDraw.draw(data.nodeList)
  },

 //初始化
  getReady:function(){
	
		var areaId = '#drop-bg';

		$('.btn-controler').draggable({
			helper: 'clone',
			scope: 'ss'
		})

		$(areaId).droppable({
			scope: 'ss',
			drop: function (event, ui) {
				//console.log(ui.draggable[0].dataset.template);
	
				flowFun.dropNode(ui.draggable[0].dataset.template, ui.position)
			},
// 			stop: function (event, ui) {
// 					console.log(ui);
// 			}
		})

		$('#app').on('click', function (event) {
			event.stopPropagation()
			event.preventDefault()
			flowFun.eventHandler(event.target.dataset)
		})

		// 单点击了连接线上的X号
		jsPlumb.bind('dblclick', function (conn, originalEvent) {
			DataDraw.deleteLine(conn)
		})

		// 当链接建立
		jsPlumb.bind('beforeDrop', function (info) {
	
				var sourceId = info["sourceId"];
				var targetId = info["targetId"];
				var strs= new Array();
				strs = sourceId.split("-");
				var sourceNode = "node-"+strs[1];
				
				var target = new Array(); 
				target = targetId.split("-");
				var End = target[1];
				

				var lasting = NodeList.length;
				for (var i=0;i<lasting;i++) {
					
					if(NodeList[i].key == sourceNode){
						var thumb = NodeList[i].thumb;
						var thumblong = thumb.length;
						for (var j=0;j<thumblong;j++) {
							if(thumb[j].key == sourceId){
								
								 if(targetId.indexOf("-heading") != -1){
									 alert("请双击新建成功保存节点后再连接，否则无效。");
									 return false;
								 }else{
								 	 $("#isHaveChange").val(1);
									 NodeList[i].thumb[j].nextNode = targetId;
									 NodeList[i].thumb[j].nextNodeId = End;
								 }  				
								
							}
						}
						
					}
					
					if(NodeList[i].key == targetId){
						NodeList[i].pid = strs[1];
						NodeList[i].pNode = sourceNode;
					}
					
				}
			 
			 
			return connectionBeforeDropCheck(info)
			

			
		})

		DataDraw.draw(data.nodeList); 
		dataStructure(data.nodeList);
		
		flowFun.emptyCanvas();
		
	},

  //清空画布
	emptyCanvas:function(){
	
		 var lasting = NodeList.length;
		 for (var i=0;i<lasting;i++) {
			 jsPlumb.remove(NodeList[i].key);
		 }
		 NodeList.splice(0,NodeList.length);
    // jsPlumb.setContainer('diagramContainer');
		
	},

  // 链接建立后的检查
  // 当出现自连接的情况后，要将链接断开
  connectionBeforeDropCheck:function  (info) {
 
    if (!info.connection.source.dataset.pid) {
      return true
    }
    return info.connection.source.dataset.pid !== info.connection.target.dataset.id
  },

  // 获取基本配置
  getBaseNodeConfig:function  () {
  
    return Object.assign({}, visoConfig.baseStyle)
  },

  // 初始化开始节点属性
  initBeginNode:function  (id) {
 
    var config = this.getBaseNodeConfig()

    config.isTarget = false
    config.maxConnections = 1

    jsPlumb.addEndpoint(id, {
      anchors: 'Bottom',
      uuid: id + '-out'
    }, config)
  },

  // 初始化结束节点属性
  initEndNode:function  (id) {
  
    var config = this.getBaseNodeConfig()

    config.isSource = false

    jsPlumb.addEndpoint(id, {
      anchors: 'Top',
      uuid: id + '-in'
    }, config)
  }
 };

  var DataProcess = {
    inputData: function (nodes) {
    
      var ids = this.getNodeIds(nodes)
      var g = new graphlib.Graph()

      ids.forEach(function (id) {
        g.setNode(id)
      })

      var me = this

      nodes.forEach(function (item) {
        if (me['dealNode' + item.type]) {
          me['dealNode' + item.type](g, item)
        } else {
          console.error('have no deal node of ' + item.type)
        }
      })

     // console.log(g.nodes())
      var distance = graphlib.alg.dijkstra(g, 'Start')

      return this.generateDepth(distance)
    },
    setNodesPosition: function (nodes) {
  	
      var me = this
      nodes.forEach(function (item) {
        me.getNodePosition(item)
      })
    },
    getNodePosition: function (node) {
    
      var $node = document.getElementById(node.id)
      node.top = parseInt($node.style.top)
      node.left = parseInt($node.style.left)
    },
    generateDepth: function (deep) {
    
      var depth = []

      Object.keys(deep).forEach(function (key) {
        var distance = deep[key].distance

        if (!depth[distance]) {
          depth[distance] = []
        }

        depth[distance].push(key)
      })

      return depth
    },
    getNodeIds: function (nodes) {
    
      return nodes.map(function (item) {
        return item.id
      })
    },
    dealNodeRoot: function (g, node) {
    
      this.setEdge(g, node.id, node.data.nextNode)
    },
    dealNodeAnnounce: function (g, node) {
    
      this.setEdge(g, node.id, node.data.nextNode)
    },
    dealNodeExit: function (g, node) {
		
    },
    dealNodeWorkTime: function (g, node) {
    	
      this.setEdge(g, node.id, node.data.onWorkNode)
      this.setEdge(g, node.id, node.data.offWorkNode)
    },
    dealNodeMenu: function (g, node) {
      this.setEdge(g, node.id, node.data.nextNode)
    },
    setEdge: function name (g, from, to) {
     // console.log(from + ' ---> ' + to)
      g.setEdge(from, to)
    }
  };

  var DataDraw = {
    deleteLine: function (conn) {
      if (confirm('确定删除所点击的链接吗？')) {
      	
		$("#isHaveChange").val(1);  //改变了数据，跳转时做判断用，提示是否保存
		
        jsPlumb.detach(conn);
			
				var sourceId = conn["sourceId"];
				var targetId = conn["targetId"];
				var strs= new Array();
				strs=sourceId.split("-");
				var sourceNode = "node-"+strs[1];
				
				var lasting = NodeList.length;
				for (var i=0;i<lasting;i++) {
					if(NodeList[i].key == sourceNode){
						var thumb = NodeList[i].thumb;
						var thumblong = thumb.length;
						for (var j=0;j<thumblong;j++) {
							if(thumb[j].key == sourceId){
							  NodeList[i].thumb[j].nextNode = null;
								NodeList[i].thumb[j].nextNodeId = null;
							}
							
						}
						
					}
					
					//清空父节点
					if(NodeList[i].key == targetId){
						NodeList[i].pid = 0;
						NodeList[i].pNode = null;
					}
					
					
				}
				

				for (var j=0;j<lasting;j++) {
					
					if(NodeList[j].type == "Menu"){
						var tothumb = NodeList[j].thumb;
						var tolong = tothumb.length;
						
						for (var n=0;n<tolong;n++) {
							if(tothumb[n].nextNode == targetId){
								for (var m=0;m<lasting;m++) {
									if(NodeList[m].key == targetId){
										if(NodeList[m].pid == 0){
											NodeList[m].pid = NodeList[j].id;
											NodeList[m].pNode = "node-"+NodeList[j].id;
										}
									}
								}
							}
							
						}
						
					}
					
				}
				

      }
    },
    draw: function (nodes) {
    
      // 将Exit节点排到最后
      nodes.sort(function (a, b) {
        if (a.type === 'Exit') return 1
        if (b.type === 'Exit') return -1
        return 0
      })

      this.computeXY(nodes)

      // var template = $('#tpl-demo').html()
	    var areaId = '#drop-bg';
      var $container = $(areaId)
      var me = this
      // console.log(nodes);
      nodes.forEach(function (item, key) {

        var data = {
          id: "node-"+item.id,
          name: item.name,
					content: item.content,
          top: item.top,
          left: item.left,
					type: "old",
					key: item.id,
					nextName:item.next_name,
          choices: item.data.choices || []
        }

        var template = me.getTemplate(item)

        $container.append(Mustache.render(template, data))
      
				//暂时注释
        if (me['addEndpointOf' + item.type]) {
          me['addEndpointOf' + item.type](item)
        }
      })

      this.mainConnect(nodes)
    },
    connectEndpoint: function (from, to) {
	 
      jsPlumb.connect({ uuids: [from, to] })
    },
    mainConnect: function (nodes) {
      
      var me = this
      nodes.forEach(function (item) {
        if (me['connectEndpointOf' + item.type]) {
          me['connectEndpointOf' + item.type](item)
        }
      })
    },
    getTemplate: function (node) {
    	
      return $('#tpl-' + node.type).html() || $('#tpl-demo').html()
    },
    computeXY: function (nodes) {
    	
      var matrix = DataProcess.inputData(nodes)

      var base = {
        topBase: 50,
        topStep: 150,
        leftBase: 150,
        leftStep: 200
      }

      for (var i = 0; i < matrix.length; i++) {
        for (var j = 0; j < matrix[i].length; j++) {
          var key = matrix[i][j]

          var dest = nodes.find(function (item) {
            return item.id === key
          })

          dest.top = dest.top || base.topBase + i * base.topStep
          dest.left = dest.left || base.leftBase + j * base.leftStep
        }
      }
    },
		

    addEndpointOfWorkTime: function (node) {

      flowFun.addDraggable("node-"+node.id)
      flowFun.setEnterPoint("node-"+node.id)
			
    },
    connectEndpointOfWorkTime: function (node) {
     
      this.connectEndpoint(node.id + '-onWorkTime-out', node.data.onWorkNode + '-in')
      this.connectEndpoint(node.id + '-offWorkTime-out', node.data.offWorkNode + '-in')
    },
    addEndpointOfMenu: function (node) {
    	//  console.log(node);
       flowFun.addDraggable("node-"+node.id)
       flowFun.setEnterPoint("node-"+node.id)


       //暂时注释
       node.data.choices.forEach(function (item,value) {
				//console.log('key-'+ item.flow_id + '-' + item.id);
				// key-{{id}}-{{key}}   item.nextNode
         flowFun.setExitPoint("key-" + node.id + '-' + item.id, 'Bottom')
       })
    },
    connectEndpointOfMenu: function (node) {
	
      // this.connectEndpoint(node.id + '-noinput-out', node.data.noinput.nextNode + '-in')
     // this.connectEndpoint(node.id + '-nomatch-out', node.data.nomatch.nextNode + '-in')
		 
       var me = this

      node.data.choices.forEach(function (item) {
      	
		// console.log('key-'+ item.nextNode + '-' + item.key + '-out');
        me.connectEndpoint('key-'+ item.flow_id + '-' + item.id + '-out', 'node-'+item.next_flow_id + '-in')
      })

    }
  };

 //jsPlumb.ready();
  jsPlumb.importDefaults({
    ConnectionsDetachable: false
  })
