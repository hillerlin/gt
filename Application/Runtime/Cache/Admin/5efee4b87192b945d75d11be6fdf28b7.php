<?php if (!defined('THINK_PATH')) exit();?><div class="bjui-pageContent">
    <form action="<?php echo U('FundManage/contractInfoSave')?>" id="j_custom_form" data-toggle="validate"
          data-alertmsg="false">
        <input type="hidden" name="fund_id" value="<?php echo ($fund_id); ?>">
        <input type="hidden" name="type" value="<?php echo ($type); ?>">
        <table class="table table-condensed table-hover" width="100%">
            <tbody>
            <tr>
                <td>
                    <label for="j_custom_content" class="control-label x85">内容编辑：</label>
                    <div style="display: inline-block; vertical-align: middle;">
                        <?php if($type===1):?>
                             <textarea name="file_path" id="j_form_content" class="j-content" style="width: 800px;"
                                       data-toggle="kindeditor" data-minheight="200">
                                <?php echo htmlspecialchars_decode($file_path)?>
                                </textarea>
                        <?php else:?>
                                         <textarea name="contract_file" id="j_form_content2" class="j-content"
                                                   style="width: 800px;" data-toggle="kindeditor" data-minheight="200">
                                 <?php echo htmlspecialchars_decode($contract_file)?>
                                </textarea>

                        <?php endif;?>

                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </form>
</div>
<div class="bjui-pageFooter">
    <ul>
        <li>
            <button type="button" class="btn-close" data-icon="close">取消</button>
        </li>
        <li>
            <button type="submit" class="btn-default" data-icon="save">保存</button>
        </li>
    </ul>
</div>