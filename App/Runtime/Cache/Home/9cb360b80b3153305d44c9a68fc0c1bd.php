<?php if (!defined('THINK_PATH')) exit();?><div class="bjui-pageHeader">
    <form id="pagerForm" data-toggle="ajaxsearch" action="/X-CRM3/index.php?s=/Home/Basic/hetong" method="post">
	<input type="hidden" name="pageSize" value="<?php echo ($numPerPage); ?>">
    <input type="hidden" name="pageCurrent" value="<?php echo ((isset($_REQUEST['pageNum']) && ($_REQUEST['pageNum'] !== ""))?($_REQUEST['pageNum']):1); ?>">
        <div class="bjui-searchBar">
		<label>筛选:</label>
            <select name="filter" data-toggle="selectpicker">
			<option value="">全部</option>
				<?php if(is_array($filters)): $i = 0; $__LIST__ = $filters;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value='<?php echo ($v["type"]); ?>' <?php if( $v["type"] == $_REQUEST['filter'] ): ?>selected<?php endif; ?> ><?php echo ($v["type"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>&nbsp;
             <label>关键词：</label><input type="text" value="<?php echo ($_REQUEST['keys']); ?>" name="keys" class="form-control" size="15" />
             <button type="submit"  class="btn-default" data-icon="search">查询</button>
            <a class="btn btn-orange" href="javascript:;" data-toggle="reloadsearch" data-clear-query="true" data-icon="undo">清空查询</a>&nbsp;
        </div>
    </form>
</div>
<div class="bjui-pageContent tableContent">
    <table data-toggle="tablefixed" data-width="100%" data-layout-h="0">
        <thead>
            <tr>
                <th data-order-field="bianhao">No.</th>
				<th data-order-field="mingcheng">合同名称</th>
                <th data-order-field="title">客户名称</th>
				<th data-order-field="name">联系人</th>
                <th data-order-field="dianhua">电话</th>
                <th width="74">操作</th>
            </tr>
        </thead>
        <tbody>
		  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
             <td><?php echo ($v["bianhao"]); ?></td>
             <td><?php echo ($v["mingcheng"]); ?></td>
			 <td><?php echo ($v["title"]); ?></td>
		     <td><?php echo ($v["name"]); ?> </td>
		     <td><?php echo ($v["dianhua"]); ?></td>
                <td>
                    <a href="javascript:;" data-toggle="lookupback" data-args="{hid:'<?php echo ($v["id"]); ?>', mingcheng:'<?php echo ($v["mingcheng"]); ?>', bianhao:'<?php echo ($v["bianhao"]); ?>', title:'<?php echo ($v["title"]); ?>',name:'<?php echo ($v["name"]); ?>',dianhua:'<?php echo ($v["dianhua"]); ?>',jingban:'<?php echo ($v["jingban"]); ?>'}" class="btn btn-blue" title="选择本项" data-icon="check">选择</a>
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
    <div class="bjui-footBar">
        <div class="pages">
            <span>共 <?php echo ($totalCount); ?> 条  每页 <?php echo ($numPerPage); ?> 条</span>
        </div>
	    <div class="pagination-box" data-toggle="pagination" data-total="<?php echo ($totalCount); ?>" data-page-size="<?php echo ($numPerPage); ?>" data-page-current="<?php echo ($currentPage); ?>">
        </div>
    </div>
</div>