<?php if (!defined('THINK_PATH')) exit();?>
<div class="bjui-pageContent">
    <table data-toggle="tablefixed" data-width="100%" data-layout-h="0">
	 <thead>
            <tr>
                <th height=30>如果没有合适的，直接输入即可</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="padding:5px;">
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>&nbsp;<a href="javascript:;" data-toggle="lookupback" data-args="{ jingban:'<?php echo ($v["jingban"]); ?>'}" class="btn btn-blue" title="<?php echo ($v["jingban"]); ?>" data-icon="check"><?php echo ($v["jingban"]); ?></a>&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>	
                </td>
            </tr>
        </tbody>
    </table>
</div>